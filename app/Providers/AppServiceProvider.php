<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//import Paginator
use Illuminate\Pagination\Paginator;

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
        //Use Bootstrap
        Paginator::useBootstrap();
    }
}
