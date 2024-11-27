<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OtpMail extends Notification
{
    protected $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Kode OTP Anda')
            ->line('Berikut adalah kode OTP Anda:')
            ->line($this->otp)
            ->line('Kode ini berlaku selama beberapa menit saja.');
    }
}   
