<?php

namespace App\Infra\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any view services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any view services.
     */
    public function boot(): void
    {
        Vite::useScriptTagAttributes(['defer' => true]);
    }
}
