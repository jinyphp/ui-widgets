<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class WidgetCard extends Component
{
    use WithFileUploads;
    use \Jiny\WireTable\Http\Trait\Upload;

    public $widget=[]; // 위젯정보
    public $filename;
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

    use \Jiny\Widgets\Http\Trait\DesignMode;



    public function mount()
    {
        $this->dataload();
        $this->viewFormFile();
        $this->viewListFile();

        // 데이터 파일명과 동일한 구조의 url 경로로 임시설정
        $this->upload_path = "/".str_replace(".", "/", $this->filename);
    }

    private function dataload()
    {
        //dd($this->widget);
        $conf = str_replace("/",".",$this->filename);
        //$this->widget = config($conf);
        $widget = config($conf);
        //dd($widget);

        if($widget) {
            foreach($widget as $key => $item) {
                // 외부 설정값 우선적용
                // 없는 경우, 설정파일값으로 대체
                if(!isset($this->widget[$key])) {
                    $this->widget[$key] = $item;
                }
            }
        }

        // items 데이터 읽기
        if($this->widget) {
            if(isset($this->widget['items'])) {
                $this->rows = $this->widget['items'];
            }
        }
    }

    public function render()
    {
        if(!$this->filename) {
            return <<<EOD
            <div>Widget 데이터 파일명이 없습니다.</div>
            EOD;
        }

        // 기본값
        $viewFile = 'jiny-widgets::widgets.view';
        return view($viewFile);
    }

    private function viewListFile()
    {
        $viewFile = 'jiny-widgets::widget.view.list';

        if(isset($this->widget['view']['list'])) {
            $viewFile = $this->widget['view']['list'];
        }

        //dump($viewFile);
        //dd($this->widget);
        //dd($viewFile);

        $this->viewList = $viewFile;
        return $viewFile;
    }

    private function viewFormFile()
    {
        $this->viewForm = "jiny-widgets::widgets.view_form";

        if(isset($this->widget['view']['form'])) {
            $this->viewForm = $this->widget['view']['form'];
        }

        return $this->viewForm;
    }

    protected $listeners = [
        'create','popupFormCreate',
        'edit','popupEdit','popupCreate'
    ];

    public $forms_old;
    public function modify()
    {
        $this->popupForm = true;
        $this->forms = $this->rows;
        $this->forms_old = $this->rows;
    }


    public function update()
    {
        // 2. 시간정보 생성
        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        // 3. 파일 업로드 체크 Trait
        $this->fileUpload($this->forms, $this->upload_path);

        // 이미지삭제
        $this->deleteUploadFiles($this->forms, $this->forms_old);

        $this->rows = $this->forms;
        $this->widget['items'] = $this->rows;
        $this->phpSave($this->widget, $this->filename);

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


    private function deleteUploadFiles($form, $old=null)
    {
        $path = storage_path('app');
        $type_name = ["image", "img", "images", "upload"];

        foreach($form as $key => $item) {
            if(in_array($key, $type_name)) {

                // 수정 케이스
                if($old && isset($old[$key]) && isset($form[$key])) {
                    if($old[$key] != $form[$key]) {
                        $filepath = $path."/".$old[$key];
                        if(file_exists($filepath)) {
                            unlink($filepath);
                        }
                    }
                }
                // 삭제 케이스
                else {
                    $filepath = $path."/".$item;
                    if(file_exists($filepath)) {
                        unlink($filepath);
                    }
                }
            }
        }
    }

    public $setup = false;
    public function setting()
    {
        $this->popupForm = true;
        $this->setup = true;
    }

    public function phpSave($rows, $filepath)
    {
        // 저장
        $str = $this->convToPHP($rows);
$file = <<<EOD
<?php
return $str;
EOD;
        // PHP 설정파일명
        $path = $this->filename($filepath);

        // 설정 디렉터리 검사
        $info = pathinfo($path);
        if(!is_dir($info['dirname'])) mkdir($info['dirname'],0755, true);

        file_put_contents($path, $file);
    }

    public function convToPHP($form, $level=1)
    {
        $str = "[\n"; //초기화
        $lastKey = array_key_last($form);

        foreach($form as $key => $value) {
            for($i=0;$i<$level;$i++) $str .= "\t";

            if(is_array($value)) {
                $str .= "'$key'=>".''.$this->convToPHP($value,$level+1).'';
            } else {
                $str .= "'$key'=>".'"'.addslashes($value).'"';
            }

            if($key != $lastKey) $str .= ",\n";
        }

        $str .= "\n";

        if($level>1) {
            for($i=0;$i<$level-1;$i++) $str .= "\t";
        }

        $str .= "]";

        return $str;
    }


    /**
     * 설정 파일명 얻기
     */
    private function filename($filename)
    {
        $filename = str_replace(".", DIRECTORY_SEPARATOR, $filename);
        $path = config_path().DIRECTORY_SEPARATOR.$filename.".php";
        return $path;
    }
}
