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
        $this->mergeConfigFrom(
            __DIR__ . '/config/adminbar.php', 'adminbar'
        );
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

        //Publish config
        $this->publishes([
            __DIR__ . '/config/adminbar.php' => config_path('adminbar.php'),
        ], 'NovaAdminBarConfig');

        //Publish assets
        $this->publishes([
            __DIR__ . '/resources/assets/css' => public_path('vendor/nova-admin-bar/css'),
            __DIR__ . '/resources/assets/logo.svg' => public_path('vendor/nova-admin-bar/logo.svg'),
        ], 'NovaAdminBarAssets');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'NovaAdminBar');
    }
}
