<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class WidgetJson extends Component
{
    public $filename;
    public $widget=[]; // 위젯정보
    public $setup = false;

    use WithFileUploads;
    use \Jiny\WireTable\Http\Trait\Upload;



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

        // 데이터 파일명과 동일한 구조의 url 경로로 임시설정
        $this->upload_path = "/".str_replace(".", "/", $this->filename);
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

    protected function deleteUploadFiles($form, $old=null)
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


    public function setting()
    {
        $this->popupForm = true;
        $this->setup = true;
    }


    protected function dataload($type="json")
    {
        $widget = [];

        if($type=="json") {
            $path = resource_path('widgets');
            if(!is_dir($path)) mkdir($path,0777,true);

            if(file_exists($path.DIRECTORY_SEPARATOR.$this->filename.".json")) {
                $body = file_get_contents($path.DIRECTORY_SEPARATOR.$this->filename.".json");
                $widget = json_decode($body,true);
            }

            //dd($widget);

        } else {
            // php config
            $conf = str_replace("/",".",$this->filename);
            $widget = config($conf);
        }



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

    protected function widgetSave($rows, $filepath)
    {
        $str = json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

        $path = resource_path('widgets');
        if(!is_dir($path)) mkdir($path,0777,true);

        $filepath = str_replace(["/","."],DIRECTORY_SEPARATOR,$filepath);
        file_put_contents($path.DIRECTORY_SEPARATOR.$filepath.".json", $str);

        return true;



    }

    protected function widgetSavePHP($rows, $filepath)
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

    protected function convToPHP($form, $level=1)
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
    protected function filename($filename)
    {
        $filename = str_replace(".", DIRECTORY_SEPARATOR, $filename);
        $path = config_path().DIRECTORY_SEPARATOR.$filename.".php";
        return $path;
    }

}
