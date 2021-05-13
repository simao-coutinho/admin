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
        //
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/simao-coutinho'),
        ], 'public');
        include __DIR__.'/routes/web.php';
    }
}
