<?php

namespace App\Mail;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetMail extends Notification
{

    protected $resetLink;

    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Link Reset Password')
            ->line('Berikut adalah link reset password Anda:')
            ->line($this->resetLink)
            ->line('link ini berlaku selama 30 menit');
    }
}
