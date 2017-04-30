<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MollieServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Socialite::extend('mollie', function ($app) {
            $config = $app['config']['services.mollie'];

            return Socialite::buildProvider('Mollie\Laravel\MollieConnectProvider', $config);
        });
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
