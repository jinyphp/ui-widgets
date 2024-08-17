<?php
namespace Jiny\Widgets\Http\Trait;

use Illuminate\Support\Facades\View;

trait WidgetSaveJsonWithBlade
{
    public $filename;
    public $viewBlade;

    protected function dataload($type="json")
    {
        $widget = [];

        $path = resource_path('widgets');
        if(!is_dir($path)) mkdir($path,0777,true);

        if(file_exists($path.DIRECTORY_SEPARATOR.$this->filename.".json")) {
            $body = file_get_contents($path.DIRECTORY_SEPARATOR.$this->filename.".json");
            $widget = json_decode($body,true);
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

        // blade 뷰 경로 읽기
        // 파일이 있는 경우 설정, 없는 경우 null
        $this->viewBlade = str_replace("/", ".", $this->filename);
        $this->viewBlade .= ".code";
        if(View::exists($this->viewBlade)) {
            $this->viewBlade = null;

        }

        //dd($this->viewBlade);
    }

    protected function widgetSave($rows, $filepath)
    {
        $str = json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );

        $path = resource_path('widgets');
        $filepath = str_replace(["/","."],DIRECTORY_SEPARATOR,$filepath);

        //$dir = $this->filedir($path.DIRECTORY_SEPARATOR.$filepath);
        $dir = $path.DIRECTORY_SEPARATOR.$filepath;

        if(!is_dir($dir)) {
            mkdir($dir,0777,true);
        }

        file_put_contents($path.DIRECTORY_SEPARATOR.$filepath.".json", $str);

        // Blade 저장
        if(isset($rows['items']['blade'])) {
            $code = $rows['items']['blade'];
            file_put_contents(
                $path.DIRECTORY_SEPARATOR.$filepath.DIRECTORY_SEPARATOR."code.blade.php",
                $code);
        }



        return true;
    }

    private function filedir($path)
    {
        // Find the position of the last '/'
        $lastSlashPos = strrpos($path, DIRECTORY_SEPARATOR);

        if ($lastSlashPos !== false) {
            // Remove everything after the last '/'
            return substr($path, 0, $lastSlashPos);
        }

        // If no '/' is found, the result should be the original path
        return $path;
    }


}
