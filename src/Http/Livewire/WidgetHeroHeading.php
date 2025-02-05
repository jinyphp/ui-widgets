<?php
namespace Jiny\Widgets\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\On;

/**
 * 헤더 텍스트 위젯
 */
use Jiny\Widgets\Http\Livewire\WidgetHero;
class WidgetHeroHeading extends WidgetHero
{
    public function mount()
    {
        parent::mount();

        // 위젯공유를 위한 DB 저장
        if($this->filename) {
            $w = DB::table('site_widgets')->where('filename', $this->filename)->first();
            if(!$w) {
                DB::table('site_widgets')->insert([
                    'filename' => $this->filename
                ]);
            }
        }

        //dd($this->viewList);

    }

    /**
     * 뷰 파일 설정
     */
    protected function viewListFile()
    {
        if(isset($this->widget['view']['list'])
            && $this->widget['view']['list']) {
            return $this->widget['view']['list'];
        }

        return 'jiny-widgets::hero.heading.main';

        // if(!$this->viewList) {
        //     return 'jiny-widgets::hero.heading.main';
        //     $this->viewList = 'jiny-widgets::hero.heading.main';
        // }

        // return $this->viewList;
    }

    protected function viewFormFile()
    {
        if(isset($this->widget['view']['form'])) {
            return $this->widget['view']['form'];
        }

        return 'jiny-widgets::hero.heading.form';

        // if(!$this->viewForm) {
        //     $this->viewForm = "jiny-widgets::hero.heading.form";
        // }
    }


}
