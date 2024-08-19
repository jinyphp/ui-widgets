<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class WidgetBlade extends Component
{
    use WithFileUploads;
    use \Jiny\WireTable\Http\Trait\Upload;

    public $uuid;

    public $widget = []; // 위젯정보
    public $setup = false;

    public $upload_path;

    public $viewFile;
    public $rows = [];

    public $popupForm = false;
    public $viewForm;
    public $viewList;

    public $popupDelete = false;
    public $confirm = false;

    public $actions = [];
    public $forms = [];
    public $edit_id;

    public $codeEditable = false;
    public $sourceCodePath;

    use \Jiny\Widgets\Http\Trait\DesignMode;
    use \Jiny\Widgets\Http\Trait\WidgetSaveJsonWithBlade;

    public function mount()
    {
        $uuid = uniqid(mt_rand(), true);
        // 소수점(.)을 빈 문자열로 대체하여 제거
        $this->uuid = str_replace('.', '', $uuid);

        $this->dataload();

        $this->viewListFile();
        $this->viewFormFile();

        // 데이터 파일명과 동일한 구조의 url 경로로 임시설정
        $this->upload_path = "/" . str_replace(".", "/", $this->filename);
    }

    public function render()
    {
        if (!$this->filename) {
            return <<<EOD
            <div>Widget 데이터 파일명이 없습니다.</div>
            EOD;
        }

        if (!$this->viewFile) {
            $this->viewFile = 'jiny-widgets::blade.basic.layout';
        }

        // 코드 수정모드
        if($this->codeEditable) {
            return view('jiny-widgets::blade.basic.code_edit');
        }

        // 일반 모드
        return view($this->viewFile);
    }

    protected function viewListFile()
    {
        if (!$this->viewList) {
            $this->viewList = 'jiny-widgets::blade.basic.main';
        }
    }

    protected function viewFormFile()
    {
        if (!$this->viewForm) {
            $this->viewForm = "jiny-widgets::blade.basic.form";
        }
    }

    protected $listeners = [
        'create',
        'popupFormCreate',
        'edit',
        'popupEdit',
        'popupCreate'
    ];

    public $forms_old;
    public function modify()
    {
        $this->popupForm = true;
        $this->forms = $this->rows;
        $this->forms_old = $this->rows;

        //$blade = file_get_contents(View::getFinder()->find('widgets::' . $this->viewBlade));
        //$this->forms['blade'] = $blade;
    }


    public function update()
    {
        // 2. 시간정보 생성
        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        // 3. 파일 업로드 체크 Trait
        $this->upload_path = "/"; //"/upload";
        $this->upload_move = "/images/widgets/".$this->filename; // 슬롯 안쪽으로 이동
        $this->fileUpload($this->forms, $this->upload_path);
        // dd($this->forms);

        // 파일을 재등록 한 경우
        // 이전 파일은 삭제 합니다.
        $this->deleteUploadFiles($this->forms, $this->forms_old);

        $this->rows = $this->forms;
        $this->widget['items'] = $this->rows;
        $this->widgetSave($this->widget, $this->filename);

        $this->forms = [];
        $this->edit_id = null;
        $this->popupForm = false;
        $this->setup = false;
    }


    public function cancel()
    {
        $this->forms = [];
        $this->edit_id = null;
        $this->popupForm = false;
        $this->setup = false;
    }

    protected function deleteUploadFiles($form, $old = null)
    {
        if($this->upload_move) {
            // 이동을 한경우
            $path = resource_path("/www");
            $path .= DIRECTORY_SEPARATOR.www_slot();
            //$path .= DIRECTORY_SEPARATOR.ltrim($this->upload_move,'/');
            $path = str_replace('\/', DIRECTORY_SEPARATOR, $path);

        } else  if($this->upload_path) {
            $path = storage_path('app');
            $path .= DIRECTORY_SEPARATOR.ltrim($this->upload_path,'/');
        }

        //dump($path);

        // 컬럼명이 다음과 같은 경우
        $type_name = ["image", "img", "images", "upload"];
        //dump($type_name);

        foreach ($form as $key => $item) {
            // 컬럼 검사
            if (in_array($key, $type_name)) {
                //dump($key);
                //dump($old);
                //dump($form);
                // 파일이 수정되어 있나요?
                // 수정 케이스
                if ($old && isset($old[$key]) && isset($form[$key])) {
                    if ($old[$key] != $form[$key]) {
                        //dump("deleting...");
                        $filepath = $path . $old[$key];
                        //dump($filepath);
                        if (file_exists($filepath)) {
                            //dd($filepath);
                            unlink($filepath);
                        }
                    }
                }
                // 삭제하는 경우
                else {
                    $filepath = $path . "/" . $item;
                    if (file_exists($filepath)) {
                        unlink($filepath);
                    }
                }
            }
        }

        //dd("dsfa");
    }


    public function setting()
    {
        $this->popupForm = true;
        $this->setup = true;
    }

    public function download()
    {
        $path = View::getFinder()->find('widgets::' . $this->viewBlade);
        $name = str_replace("/","-",$this->filename);
        //dd($name);
        return response()->download(
            $path, $name.'.blade.php'
        );
    }


    public $blade;
    public function codeEdit()
    {
        $this->codeEditable = true;

        $path = null;
        if($this->viewBlade) {
            if(View::exists("widgets::".$this->viewBlade)) {
                $path = View::getFinder()->find('widgets::' . $this->viewBlade);
            }
        }
        //dd($path);

        if($path) {
            if(file_exists($path)) {
                $this->blade = file_get_contents($path);
            } else {
                $this->blade = "";
            }
        }



    }

    public function codeEditUpdate()
    {
        $this->codeEditable = false;

        // 파일명
        $path = resource_path('widgets');
        $filepath = str_replace(["/","."],DIRECTORY_SEPARATOR,$this->filename);

        $dir = $path.DIRECTORY_SEPARATOR.$filepath;
        if(!is_dir($dir)) {
            mkdir($dir,0777,true);
        }

        //dd($this->blade);
        file_put_contents(
            $path.DIRECTORY_SEPARATOR.$filepath.DIRECTORY_SEPARATOR."code.blade.php",
            $this->blade);
    }


    public function codeEditClose()
    {
        $this->codeEditable = false;
    }

}
