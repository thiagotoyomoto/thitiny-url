<?php

namespace App\Providers;

use App\Services\ShortCodeGenerator;
use App\Services\ShortCodeGenerator\Adapters\NanoIdAdapter;
use Hidehalo\Nanoid\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ShortCodeGenerator::class, function (Application $app) {
            return new NanoIdAdapter();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
