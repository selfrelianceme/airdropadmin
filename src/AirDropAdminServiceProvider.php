<?php

namespace Selfreliance\AirDropAdmin;

use Illuminate\Support\ServiceProvider;

class AirDropAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->app->make('Selfreliance\AirDropAdmin\AirDropAdminController');
        $this->loadViewsFrom(__DIR__.'/views', 'airdropadmin');

        $this->publishes([
            __DIR__.'/public/' => public_path('vendor/airdropadmin'),
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}