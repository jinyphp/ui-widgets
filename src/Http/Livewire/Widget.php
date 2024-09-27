<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;

/**
 * 공용 위젯 컴포넌트
 */
class Widget extends Component
{
    public $setup = false;  // 디자인 모드 활성화

    public function mount()
    {
        $this->uri = Request::path();
    }

    /**
     * SiteWidgetLoop 에서 호출되는 이벤트
     * 사이트 레이아웃 및 정보 수정
     */
    #[On('widget-layout-setting')]
    public function WidgetSetLayout($widget_id)
    {
        if($this->widget['key'] == $widget_id) {
            $this->setting();
        }
    }

    /**
     * 위젯 정보 설정 팝업
     */
    public function setting()
    {
        $this->mode = "setting";
        $this->popupForm = true;
        $this->setup = true;


    }




}
