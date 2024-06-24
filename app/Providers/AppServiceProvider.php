<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public const HOME = '/home';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
