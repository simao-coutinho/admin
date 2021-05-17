<?php

namespace SimaoCoutinho\Admin;

use Illuminate\Support\ServiceProvider;

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
        //$this->publishes([
        //        __DIR__.'/../resources/views' => resource_path('views/vendor/courier'),
        //    ]);

        //$this->loadViewComponentsAs('courier', [
        //        Alert::class,
        //        Button::class,
        //    ]);

        // Se tiver migrações
        // return $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->publishes([
//            __DIR__.'/database/migrations' => database_path('migrations'),
//        ], 'migrations');

        $this->publishes([
            __DIR__ . '/public/' => public_path('vendor/simao-coutinho'),
        ], 'public');

        if ($this->app->runningInConsole()) {
//$this->commands([
//            InstallCommand::class,
//            NetworkCommand::class,
//        ]);
        }

        //$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        include __DIR__ . '/routes/web.php';

        //$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'courier');
        //$this->publishes([
        //        __DIR__.'/../resources/lang' => resource_path('lang/vendor/courier'),
        //    ]);
    }
}
