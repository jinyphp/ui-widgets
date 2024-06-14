<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

use Jiny\Widgets\Http\Livewire\WidgetJson;
class WidgetGridAvatas extends WidgetJson
{
    public function mount()
    {
        parent::mount();

        $this->viewFormFile();
        $this->viewListFile();
    }


    public function render()
    {
        if(!$this->filename) {
            return <<<EOD
            <div>Widget 데이터 파일명이 없습니다.</div>
            EOD;
        }

        // 기본값
        $viewFile = 'jiny-widgets::widgets.view';
        return view($viewFile);
    }

    private function viewListFile()
    {
        $viewFile = 'jiny-widgets::grids.avatas.list';

        if(isset($this->widget['view']['list'])) {
            $viewFile = $this->widget['view']['list'];
        }

        $this->viewList = $viewFile;
        return $viewFile;
    }

    private function viewFormFile()
    {
        $this->viewForm = "jiny-widgets::grids.avatas.form";

        if(isset($this->widget['view']['form'])) {
            $this->viewForm = $this->widget['view']['form'];
        }

        return $this->viewForm;
    }

}
