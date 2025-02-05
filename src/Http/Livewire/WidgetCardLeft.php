<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetHero;
class WidgetCardLeft extends WidgetHero
{
    public function mount()
    {
        parent::mount();
        $this->upload_path = "/upload";
    }

    protected function viewListFile()
    {
        if(isset($this->widget['view']['list'])) {
            return $this->widget['view']['list'];
        }

        return 'jiny-widgets::cards.left.main';
        if(!$this->viewList) {
            $this->viewList = 'jiny-widgets::cards.left.main';
        }
    }

    protected function viewFormFile()
    {
        if(isset($this->widget['view']['form'])) {
            return $this->widget['view']['form'];
        }

        return "jiny-widgets::cards.left.form";

        if(!$this->viewForm) {
            $this->viewForm = "jiny-widgets::cards.left.form";
        }
    }




}
