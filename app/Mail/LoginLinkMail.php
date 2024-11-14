<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class LoginLinkMail extends Mailable
{
    public $loginUrl;

    public function __construct($loginUrl)
    {
        $this->loginUrl = $loginUrl;
    }

    public function build()
    {
        return $this->view('admin.emails.login_link')
            ->with(['loginUrl' => $this->loginUrl])
            ->subject('Login Link Anda');
    }
}
