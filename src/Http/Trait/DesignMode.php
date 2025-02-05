<?php
namespace Jiny\Widgets\Http\Trait;
use Livewire\Attributes\On;

trait DesignMode
{
    public $design;

    #[On('design-mode')]
    public function designMode($mode=null)
    {
        if($this->design) {
            $this->design = false;
            //session(['design' => false]); // 세션에 design 값을 false로 설정
        } else {
            $this->design = true;
            //session(['design' => true]); // 세션에 design 값을 true로 설정
        }
    }

    /**
     * layout 모드
     * setActionsRule에서 처리됨
     */
    // #[On('layout-mode')]
    // public function layoutMode($mode=null)
    // {
    //     if($this->design) {
    //         $this->design = false;
    //     } else {
    //         $this->design = "layout";
    //     }
    // }

}
