<?php

namespace App\Providers;

use App\Listeners\SendOTPEventListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

public function boot()
{
    View::composer('partials.header', function ($view) {
        $view->with('user', Auth::user());
    });
}
}
