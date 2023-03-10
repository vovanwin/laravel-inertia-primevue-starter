<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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
