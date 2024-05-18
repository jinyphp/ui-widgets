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
        } else {
            $this->design = true;
        }
    }

}
