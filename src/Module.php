<?php
namespace AvoRed\HeroProduct;

use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\Support\Facades\Widget;
use AvoRed\Framework\Tab\TabItem;
use AvoRed\HeroProduct\Widget\HeroProductWidget;
use Illuminate\Support\ServiceProvider;

class Module extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerTab();
        $this->registerWidget();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Registering AvoRed HeroProduct Resource
     * e.g. Route, View, Database  & Translation Path
     *
     * @return void
     */
    protected function registerResources()
    {
        //$this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'avored-heroproduct');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'avored-heroproduct');
    }

    public function registerTab()
    {
        Tab::put('system.configuration', function (TabItem $tab) {
            $tab->key('system.configuration.hero.product')
                ->label('avored-heroproduct::system.config-title')
                ->view('avored-heroproduct::configuration.heroproduct');
        });
    }
    public function registerWidget()
    {
        $widget = new HeroProductWidget();
        Widget::make($widget->identifier(), $widget);
    }
}
