<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendOTPNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOTPEventListener
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->user->notify(new SendOTPNotification($event->user->activeOTP->otp_code));
    }
}
