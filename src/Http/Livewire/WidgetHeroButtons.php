<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetList;
class WidgetHeroButtons extends WidgetList
{
    public function mount()
    {
        parent::mount();
    }

    protected function viewListFile()
    {
        return 'jiny-widgets::hero.buttons.list';

        if(!$this->viewList) {
            $this->viewList = 'jiny-widgets::hero.buttons.list';
        }
    }

    protected function viewFormFile()
    {
        return "jiny-widgets::hero.buttons.form";

        if(!$this->viewForm) {
            $this->viewForm = "jiny-widgets::hero.buttons.form";
        }
    }

}
