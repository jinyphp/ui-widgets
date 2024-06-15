<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetJson;
class WidgetHero extends WidgetJson
{
    public function mount()
    {
        parent::mount();

        $this->viewFormFile();
        $this->viewListFile();
    }




    private function viewListFile()
    {
        $viewFile = 'jiny-widgets::widget.view.list';

        if(isset($this->widget['view']['list'])) {
            $viewFile = $this->widget['view']['list'];
        }

        $this->viewList = $viewFile;
        return $viewFile;
    }

    private function viewFormFile()
    {
        $this->viewForm = "jiny-widgets::widgets.view_form";

        if(isset($this->widget['view']['form'])) {
            $this->viewForm = $this->widget['view']['form'];
        }

        return $this->viewForm;
    }

}
