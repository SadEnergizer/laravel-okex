<?php

namespace Sadenergizer\Okex;

use Illuminate\Support\ServiceProvider;

class OkexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/okex.php' => config_path('okex.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('okex', function () {
            return new OkexManager;
        });
    }
}
