<?php

namespace App\Providers;

use App\Services\Api\CurrencyExchangeService;
use App\Services\Api\V1\AuthService;
use App\Services\Api\V1\impl\AuthServiceImpl;
use App\Services\Api\V1\impl\CurrencyExchangeServiceImpl;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        //API
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl();
        });

        $this->app->bind(CurrencyExchangeService::class, function ($app) {
            return new CurrencyExchangeServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
