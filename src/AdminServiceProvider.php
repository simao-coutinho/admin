<?php

namespace SimaoCoutinho\Admin;

use Illuminate\Support\ServiceProvider;
use SimaoCoutinho\Admin\Components\Breadcrumb;
use SimaoCoutinho\Admin\Components\FormContainer;
use SimaoCoutinho\Admin\Components\Input;
use SimaoCoutinho\Admin\Components\LiItem;
use SimaoCoutinho\Admin\Components\Select;
use SimaoCoutinho\Admin\Components\Select2;
use SimaoCoutinho\Admin\Components\SummernoteContent;
use SimaoCoutinho\Admin\Components\SummernoteScripts;
use SimaoCoutinho\Admin\Components\SummernoteStyles;
use SimaoCoutinho\Admin\Components\TableScripts;
use SimaoCoutinho\Admin\Components\TableStyles;
use SimaoCoutinho\Admin\Components\Textarea;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->make('SimaoCoutinho\Admin\Controllers\AdminController');
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'admin');
        // Se necessitar de publicar views
        $this->publishes([
                __DIR__.'/public-views' => resource_path('views'),
            ], "admin-views");

        $this->loadViewComponentsAs('admin', [
            Input::class,
            LiItem::class,
            Select::class,
            Select2::class,
            Textarea::class,
            SummernoteStyles::class,
            SummernoteContent::class,
            SummernoteScripts::class,
            TableScripts::class,
            TableStyles::class,
            FormContainer::class,
            Breadcrumb::class
        ]);

        // Migrations
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'admin-migrations');

        $this->publishes([
            __DIR__ . '/public/' => public_path(''),
        ], 'admin-public');

        if ($this->app->runningInConsole()) {
            // Para criar comandos de instalaçao (a ver)
//$this->commands([
//            InstallCommand::class,
//            NetworkCommand::class,
//        ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Se Tiver traduções
        $this->loadTranslationsFrom(__DIR__.'/lang', 'admin');
        //$this->publishes([
        //        __DIR__.'/../resources/lang' => resource_path('lang/vendor/courier'),
        //    ]);
    }
}
