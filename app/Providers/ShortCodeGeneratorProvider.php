<?php

namespace App\Providers;

use App\Services\ShortCodeGenerator;
use App\Services\ShortCodeGenerator\Adapters\NanoIdAdapter;
use Hidehalo\Nanoid\Client;
use Illuminate\Support\ServiceProvider;

class ShortCodeGeneratorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ShortCodeGenerator::class, function ($app) {
            return new NanoIdAdapter(
                new Client()
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
