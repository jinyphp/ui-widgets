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
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->package);

        // Custom Site Resources
        $path = resource_path('widgets');
        if(!is_dir($path)) {
            mkdir($path,0777,true);
        }
        $this->loadViewsFrom($path, 'widgets');

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // 설정파일 복사
        $this->publishes([
            __DIR__ . '/../config/setting.php' => config_path('jiny/widgets/setting.php'),
        ]);


        Blade::directive('widget', function ($args) {
            $expression = Blade::stripParentheses($args);
            return "<?php echo \$__env->make({$expression}, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";
        });


    }

    public function register()
    {
        ## 1. 코어 컴포넌트
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component(
                'HotKeyEvent',
                \Jiny\Widgets\Http\Livewire\HotKeyEvent::class
            );

            ## List
            Livewire::component(
                'WidgetList',
                \Jiny\Widgets\Http\Livewire\WidgetList::class
            );

            ## Hero
            Livewire::component(
                'WidgetHero',
                \Jiny\Widgets\Http\Livewire\WidgetHero::class
            );

            ## Blade 파일을 읽어 출력하는 Widget
            Livewire::component(
                'WidgetBlade',
                \Jiny\Widgets\Http\Livewire\WidgetBlade::class
            );



        });

        ## 2. 확장 컴포넌트
        $this->app->afterResolving(BladeCompiler::class, function () {


            ## Code
            Livewire::component(
                'WidgetCode-Html',
                \Jiny\Widgets\Http\Livewire\WidgetCode::class
            );

            Livewire::component(
                'WidgetCode-Preview',
                \Jiny\Widgets\Http\Livewire\WidgetCodePreview::class
            );
            Livewire::component(
                'WidgetCode-Component',
                \Jiny\Widgets\Http\Livewire\WidgetComponentPreview::class
            );

            Livewire::component(
                'WidgetOnlyCode',
                \Jiny\Widgets\Http\Livewire\WidgetOnlyCodePreview::class
            );

            Livewire::component(
                'WidgetText',
                \Jiny\Widgets\Http\Livewire\WidgetText::class
            );

            Livewire::component(
                'WidgetTag',
                \Jiny\Widgets\Http\Livewire\WidgetTag::class
            );


            Livewire::component(
                'WidgetHero-Heading',
                \Jiny\Widgets\Http\Livewire\WidgetHeroHeading::class
            );

            Livewire::component(
                'WidgetHero-Buttons',
                \Jiny\Widgets\Http\Livewire\WidgetHeroButtons::class
            );


            ## Cards
            Livewire::component(
                'WidgetCard',
                \Jiny\Widgets\Http\Livewire\WidgetCard::class
            );

            Livewire::component(
                'WidgetCard-Left',
                \Jiny\Widgets\Http\Livewire\WidgetCardLeft::class
            );

            Livewire::component(
                'WidgetCard-Right',
                \Jiny\Widgets\Http\Livewire\WidgetCardRight::class
            );


            ## Grids
            Livewire::component(
                'WidgetGrid',
                \Jiny\Widgets\Http\Livewire\WidgetGrid::class
            );

            Livewire::component(
                'WidgetGrid-Avatas',
                \Jiny\Widgets\Http\Livewire\WidgetGridAvatas::class
            );

            Livewire::component(
                'WidgetGrid-Images',
                \Jiny\Widgets\Http\Livewire\WidgetGridImages::class
            );


            ## Carousel
            Livewire::component(
                'WidgetCarousel',
                \Jiny\Widgets\Http\Livewire\WidgetCarousel::class
            );


            ## Table
            Livewire::component(
                'WidgetTable',
                \Jiny\Widgets\Http\Livewire\WidgetTable::class
            );

            Livewire::component(
                'WidgetTableStyle1',
                \Jiny\Widgets\Http\Livewire\WidgetTableStyle1::class
            );
            Livewire::component(
                'WidgetTableStyle2',
                \Jiny\Widgets\Http\Livewire\WidgetTableStyle2::class
            );
            Livewire::component(
                'WidgetTableStyle3',
                \Jiny\Widgets\Http\Livewire\WidgetTableStyle3::class
            );



            ## Title
            Livewire::component(
                'WidgetTitle',
                \Jiny\Widgets\Http\Livewire\WidgetTitle::class
            );



            Livewire::component(
                'WidgetList-Faq',
                \Jiny\Widgets\Http\Livewire\WidgetListFaq::class
            );
            Livewire::component('widget-list-Faq',
                \Jiny\Widgets\Http\Livewire\WidgetListFaq::class
            );

            Livewire::component(
                'WidgetNote',
                \Jiny\Widgets\Http\Livewire\WidgetNote::class
            );





            // Livewire::component('WidgetList-ourteams',
// \Jiny\Widgets\Http\Livewire\WidgetOurTeam::class);


            // Livewire::component('WidgetComponent',
// \Jiny\Widgets\Http\Livewire\WidgetComponent::class);












        });

    }

}
