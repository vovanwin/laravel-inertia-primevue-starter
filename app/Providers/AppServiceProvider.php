<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        * Enabling Eloquent "Strict Mode"
        *
        *
        * @doc https://laravel.com/docs/9.x/eloquent#enabling-eloquent-strict-mode
        */
        Model::shouldBeStrict(! $this->app->isProduction());
    }
}
