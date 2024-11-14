<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\LoginLinkMail;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function sendLoginLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Buat link login aman yang akan kedaluwarsa dalam 30 menit
        $loginUrl = URL::temporarySignedRoute(
            'login.verify',
            now()->addMinutes(30),
            ['email' => $request->email]
        );

        // Kirim email dengan link login
        Mail::to($request->email)->send(new LoginLinkMail($loginUrl));

        return back()->with('status', 'Link login telah dikirim ke email Anda.');
    }

    public function verifyLogin(Request $request)
    {
        // Cek apakah link ditandatangani dan masih valid
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        // Logika login user berdasarkan email
        $user = Pengguna::where('email', $request->email)->firstOrFail();
        Auth::login($user);

        return redirect()->intended('admin/datamaster/dashboard');
    }
}
