<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Use for paginate
use illuminate\Pagination\Paginator;

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
        // Correct BS style for paginate
        Paginator::useBootstrap();
    }
}
