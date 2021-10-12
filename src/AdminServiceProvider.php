<?php

namespace SimaoCoutinho\Admin;

use Illuminate\Support\ServiceProvider;
use SimaoCoutinho\Admin\Components\Breadcrumb;
use SimaoCoutinho\Admin\Components\FormContainer;
use SimaoCoutinho\Admin\Components\Input;
use SimaoCoutinho\Admin\Components\NavItem;
use SimaoCoutinho\Admin\Components\NavTree;
use SimaoCoutinho\Admin\Components\Select;
use SimaoCoutinho\Admin\Components\Select2;
use SimaoCoutinho\Admin\Components\SummernoteContent;
use SimaoCoutinho\Admin\Components\SummernoteScripts;
use SimaoCoutinho\Admin\Components\SummernoteStyles;
use SimaoCoutinho\Admin\Components\TableScripts;
use SimaoCoutinho\Admin\Components\TableStyles;
use SimaoCoutinho\Admin\Components\Textarea;
use SimaoCoutinho\Admin\Console\Commands\InstallCommand;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'admin');

        $this->publishes([
            __DIR__ . '/public/' => public_path(''),
        ], 'admin-public');

        $this->publishes([
            __DIR__ . '/public_views' => resource_path('views'),
        ], "admin-views");

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
