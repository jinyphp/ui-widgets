<?php
namespace Jiny\Widgets\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetCodePreview;

class WidgetTitle extends WidgetCodePreview
{
    public function mount()
    {
        parent::mount();
    }

    protected function viewListFile()
    {
        if (!$this->viewList) {
            $this->viewList = 'jiny-widgets::code.title.title';
        }
    }

    protected function viewFormFile()
    {
        if (!$this->viewForm) {
            $this->viewForm = "jiny-widgets::code.title.form";
        }
    }

}