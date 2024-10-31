<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegistrasiController extends Controller
{
    // Fungsi untuk menampilkan halaman forgot password
    public function showLinkRequestForm()
    {
        return view('manajemen.registrasi.forgot-password');
    }

    // Fungsi untuk mengirim link reset password ke email
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('password.check-email');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    // Fungsi untuk menghandle reset password dari form
    public function reset(Request $request)
    {
        // Implementasi reset password jika diperlukan
    }
}
