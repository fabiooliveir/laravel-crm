<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Força a geração de URLs com o esquema HTTPS.
        // Isso é crucial para ambientes como o Google Cloud Run,
        // onde a terminação SSL é feita no balanceador de carga.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}