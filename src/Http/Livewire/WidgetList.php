<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\Widget;
class WidgetList extends Widget
{
    use WithFileUploads;
    use \Jiny\WireTable\Http\Trait\Upload;

    public $widget=[]; // 위젯정보
    public $widget_id; // page Widget에서 전달되는 순번

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
    use \Jiny\Widgets\Http\Trait\WidgetSaveJson;

    public function mount()
    {
        if(!$this->filename) {
            if(isset($this->widget['route']) && isset($this->widget['path'])) {
                $this->filename = str_replace('/',DIRECTORY_SEPARATOR,$this->widget['route']);
                $this->filename .= DIRECTORY_SEPARATOR.$this->widget['path'];
            }
        }
        // json 파일에서 위젯 데이터 읽기
        $this->dataload();

        $this->viewFormFile();
        $this->viewListFile();

        // 데이터 파일명과 동일한 구조의 url 경로로 임시설정
        $this->upload_path = DIRECTORY_SEPARATOR.str_replace(".", DIRECTORY_SEPARATOR, $this->filename);
    }

    public function render()
    {
        if(!$this->filename) {
            return <<<EOD
            <div>Widget 데이터 파일명이 없습니다.</div>
            EOD;
        }

        if(!$this->viewFile) {
            $this->viewFile = 'jiny-widgets::widgets.layout_list';
        }

        // 기본값
        //$viewFile = 'jiny-widgets::widgets.layout';
        return view($this->viewFile);
    }

    protected function viewListFile()
    {
        if(!$this->viewList) {
            $this->viewList = 'jiny-widgets::list.group.list';
        }
    }

    protected function viewFormFile()
    {
        if(!$this->viewForm) {
            $this->viewForm = "jiny-widgets::list.group.form";
        }
    }






    protected $listeners = [
        'create','popupFormCreate',
        'edit','popupEdit','popupCreate',
        'widget-layout-setting' => "WidgetSetLayout"
    ];

    public function create($value=null)
    {
        $this->popupForm = true;
        $this->edit_id = null;

        // 데이터초기화
        $this->forms = [];
    }

    public function store()
    {
        // 0 이상인 경우, 입력한 데이터값이 있다는 의미
        if(count($this->forms)>0) {
            // 2. 시간정보 생성
            $this->forms['created_at'] = date("Y-m-d H:i:s");
            $this->forms['updated_at'] = date("Y-m-d H:i:s");

            // 3. 파일 업로드 체크 Trait
            $this->fileUpload($this->forms, $this->upload_path);

            $i = count($this->rows)+1;
            $this->rows[$i] = $this->forms;
        }


        // 위젯 정보 저장
        $this->widget['items'] = $this->rows;
        $this->widgetSave($this->widget, $this->filename);

        $this->popupForm = false;
        $this->setup = false;
    }


    public function edit($id)
    {
        $this->edit_id = $id;

        $this->forms = $this->rows[$id];

        $this->popupForm = true;
    }


    public function update()
    {
        // 2. 시간정보 생성
        $this->forms['updated_at'] = date("Y-m-d H:i:s");

        // 3. 파일 업로드 체크 Trait
        $this->fileUpload($this->forms, $this->upload_path);


        $id = $this->edit_id;
        $this->rows[$id] = $this->forms;

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


    /**
     * 삭제 팝업창 활성화
     */
    public function delete($id=null)
    {
        $this->popupDelete = true;
    }


    public function deleteCancel()
    {
        $this->popupDelete = false;
        $this->popupForm = false;
        $this->setup = false;
    }

    /**
     * 삭제 확인 컨펌을 하는 경우에,
     * 실제적인 삭제가 이루어짐
     */
    public function deleteConfirm()
    {
        $this->popupDelete = false;
        $this->popupForm = false;
        $this->setup = false;

        $id = $this->edit_id;
        $this->edit_id = null;

        // 이미지삭제
        $this->deleteUploadFiles($this->rows[$id]);

        // 데이터삭제
        unset($this->rows[$id]);

        $this->widget['items'] = $this->rows;
        $this->widgetSave($this->widget, $this->filename);
    }

    // 삭제해야 되는 이미지가 있는 경우
    protected function deleteUploadFiles($form)
    {
        $path = storage_path('app');
        $type_name = ["image", "img", "images", "upload"];

        foreach($form as $key => $item) {
            if(in_array($key, $type_name)) {
                $filepath = $path."/".$item;
                if(file_exists($filepath)) {
                    unlink($filepath);
                }
            }
        }
    }







}
