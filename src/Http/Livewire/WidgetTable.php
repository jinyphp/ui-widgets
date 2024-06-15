<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetList;
class WidgetTable extends WidgetList
{
    public function mount()
    {
        parent::mount();
    }

    protected function viewListFile()
    {
        if(!$this->viewList) {
            $this->viewList = 'jiny-widgets::table.view.list';
        }
    }

    protected function viewFormFile()
    {
        if(!$this->viewForm) {
            $this->viewForm = "jiny-widgets::table.view.form";
        }
    }

}
