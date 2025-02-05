<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetHero;
class WidgetCard extends WidgetHero
{
    public function mount()
    {
        parent::mount();
    }

    protected function viewListFile()
    {
        if(isset($this->widget['view']['list'])) {
            return $this->widget['view']['list'];
        }

        return 'jiny-widgets::cards.basic.main';

        if(!$this->viewList) {
            $this->viewList = 'jiny-widgets::cards.basic.main';
        }
    }

    protected function viewFormFile()
    {
        if(isset($this->widget['view']['form'])) {
            return $this->widget['view']['form'];
        }

        return "jiny-widgets::cards.basic.form";

        if(!$this->viewForm) {
            $this->viewForm = "jiny-widgets::cards.basic.form";
        }
    }



}
