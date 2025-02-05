<?php
namespace Jiny\Widgets\Http\Trait;

trait WidgetSaveJson
{
    public $filename;

    /**
     * widgets 에서 데이터 읽기
     */
    protected function dataload($type="json")
    {
        // 파일명에서 확장자 제거
        $filepath = str_replace('.json',"",$this->filename);
        $filepath = str_replace(["/","."],DIRECTORY_SEPARATOR,$filepath);

        // 위젯 데이터 파일 경로
        $path = resource_path('widgets'.DIRECTORY_SEPARATOR.$filepath);
        if(!is_dir($path)) mkdir($path,0777,true);

        // 파일 읽기
        if(file_exists($path.".json")) {
            $body = file_get_contents($path.".json");
            $widget = json_decode($body,true);
        } else {
            $widget = [];
        }


        // 데이터 병합
        if($widget) {
            foreach($widget as $key => $item) {
                // 외부 설정값 우선적용
                // 없는 경우, 설정파일값으로 대체
                if(!isset($this->widget[$key])) {
                    $this->widget[$key] = $item;
                }
            }
        }


        // 위젯에서 items 데이터 읽기
        if($this->widget) {
            if(isset($this->widget['items'])) {
                $this->rows = $this->widget['items'];
            }
        }

    }

    /**
     * widgets에 데이터 저장
     */
    protected function widgetSave($rows, $filepath)
    {
        // 파일명에서 확장자 제거
        $filepath = str_replace('.json',"",$this->filename);
        $filepath = str_replace(["/","."],DIRECTORY_SEPARATOR,$filepath);

        // 위젯 데이터 파일 경로
        $path = resource_path('widgets'.DIRECTORY_SEPARATOR.$filepath);
        if(!is_dir($path)) mkdir($path,0777,true);


        $data = json_encode($rows, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
        file_put_contents($path.".json", $data);

        return true;
    }

    /**
     * 파일 경로 추출
     */
    // private function filedir($path)
    // {
    //     // Find the position of the last '/'
    //     $lastSlashPos = strrpos($path, DIRECTORY_SEPARATOR);

    //     if ($lastSlashPos !== false) {
    //         // Remove everything after the last '/'
    //         return substr($path, 0, $lastSlashPos);
    //     }

    //     // If no '/' is found, the result should be the original path
    //     return $path;
    // }


}
