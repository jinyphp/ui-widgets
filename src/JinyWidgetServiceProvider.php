<?php
namespace Jiny\Widgets;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

use Illuminate\Routing\Router;

class JinyWidgetServiceProvider extends ServiceProvider
{
    private $package = "jiny-widgets";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // 설정파일 복사
        $this->publishes([
            __DIR__.'/../config/setting.php' => config_path('jiny/widgets/setting.php'),
        ]);


        Blade::directive('widget', function ($args) {
            $expression = Blade::stripParentheses($args);
            return "<?php echo \$__env->make({$expression}, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";
        });


    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('WidgetComponent',
                \Jiny\Widgets\Http\Livewire\WidgetComponent::class);

            Livewire::component('WidgetCard',
                \Jiny\Widgets\Http\Livewire\WidgetCard::class);

            Livewire::component('WidgetHero',
                \Jiny\Widgets\Http\Livewire\WidgetHero::class);

            Livewire::component('WidgetTable',
                \Jiny\Widgets\Http\Livewire\WidgetTable::class);

            Livewire::component('WidgetList-ourteams',
                \Jiny\Widgets\Http\Livewire\WidgetOurTeam::class);

            // Visual-Text Card : 왼쪽에 사진이 있고 오른쪽에 텍스트가 있는 유형

            // Picture-First Card : 상단에 그림이 있고 하단에 설명이 있는 유형

            Livewire::component('WidgetCarousel',
                \Jiny\Widgets\Http\Livewire\WidgetCarousel::class);

            Livewire::component('HotKeyEvent',
                \Jiny\Widgets\Http\Livewire\HotKeyEvent::class);
        });

    }

}
