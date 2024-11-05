<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Listeners\SendOTPEventListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        Registered::class => [
            SendOTPEventListener::class
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
