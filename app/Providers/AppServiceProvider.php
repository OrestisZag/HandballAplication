<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('telephone', function ($attribute, $value) {
            //telephone can contain only numbers, +, -, ( and )
            return preg_match('/^([0-9\s\-\+\(\)]*)$/', $value);
        });

        Validator::extend('mobile', function ($attribute, $value) {
            //mobile can start with + and contain only numbers and -
           return preg_match('/^\+?\d[0-9-]{9,12}/', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
