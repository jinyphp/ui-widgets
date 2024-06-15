<?php
namespace Jiny\Widgets\Http\Trait;

trait WidgetSaveJson
{
    public $filename;

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

}
