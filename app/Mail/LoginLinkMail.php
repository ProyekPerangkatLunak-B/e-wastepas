<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class LoginLinkMail extends Mailable
{
    public $loginUrl;
    public $namaPengguna;
    public $ipAddress;
    public $location;

    public function __construct($loginUrl, $namaPengguna, $ipAddress, $location)
    {
        $this->loginUrl = $loginUrl;
        $this->namaPengguna = $namaPengguna;
        $this->ipAddress = $ipAddress;
        $this->location = $location;
    }

    public function build()
    {
        return $this->view('admin.emails.login_link')
            ->with([
                'loginUrl' => $this->loginUrl,
                'namaPengguna' => $this->namaPengguna,
                'ipAddress' => $this->ipAddress,
                'location' => $this->location,
            ])
            ->subject('Login Link Anda');
    }
}
