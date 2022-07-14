<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Validator;

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
        setLocale(LC_TIME, 'cs_CZ');
        \Carbon\Carbon::setLocale(config('app.locale'));

        Validator::extend('without_spaces', function($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        Paginator::useBootstrap();
    }
}
