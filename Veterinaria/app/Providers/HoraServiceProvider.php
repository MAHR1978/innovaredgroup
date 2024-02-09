<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\HoraServiceInterface;
use App\Services\HoraService;

class HoraServiceProvider extends ServiceProvider
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
        $this->app->bind(HoraServiceInterface::class, HoraService::class);
    }
}
