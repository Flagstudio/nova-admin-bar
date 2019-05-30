<?php

namespace Flagstudio\NovaAdminBar;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class NovaAdminBarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind('adminbar', function() {
            return new \Flagstudio\NovaAdminBar\AdminBar;
        });

        $this->publishes([
            //Config
            __DIR__ . '/config/adminbar.php' => config_path('adminbar.php'),

            //Assets
            __DIR__ . '/resources/assets/css' => public_path('vendor/nova-admin-bar/css'),
            __DIR__ . '/resources/assets/logo.svg' => public_path('vendor/nova-admin-bar/logo.svg'),
        ], 'NovaAdminBar');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'NovaAdminBar');
    }
}
