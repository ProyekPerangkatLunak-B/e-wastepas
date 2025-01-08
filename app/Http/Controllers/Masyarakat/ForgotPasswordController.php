<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{

    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input email
        $request->validate(['email' => 'required|email']);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate reset token
            $token = Str::random(60);

            // Simpan token yang telah dienkripsi di kolom password (atau gunakan tabel terpisah jika ada)
            $user->kata_sandi = Hash::make($token);
            $user->save();

            // Generate reset URL
            $resetUrl = url('password/reset/' . $token);

            // Kirim email reset password

            Mail::send([], [], function ($message) use ($user, $resetUrl) {
                $message->to($user->email)
                        ->subject('Reset Password')
                        ->html('Click the following link to reset your password: <a href="' . $resetUrl . '">Reset Password</a>');
            });
            // Berikan respons sukses
            return back()->with(['status' => 'Link reset password telah dikirim ke email Anda.']);
        }

        // Jika email tidak ditemukan
        return back()->withErrors(['email' => 'Email tidak terdaftar']);
    }
}
