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
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Se tiver migrações
        // return $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->publishes([
//            __DIR__.'/database/migrations' => database_path('migrations'),
//        ], 'migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/public/' => public_path('vendor/simao-coutinho'),
            ], 'public');
        }

        include __DIR__.'/routes/web.php';
    }
}
