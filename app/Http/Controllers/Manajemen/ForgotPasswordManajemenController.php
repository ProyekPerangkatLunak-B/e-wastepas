<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordManajemenController extends Controller
{
    // Menampilkan form untuk forgot password
    public function showLinkRequestForm()
    {
        return view('manajemen.registrasi.forgot-password');
    }

    // Mengirimkan email link reset password
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input email
        $request->validate(['email' => 'required|email']);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate reset token
            $token = Str::random(60);

            // Simpan token yang telah dienkripsi
            $user->update([
                'reset_token' => Hash::make($token)
            ]);

            // Generate URL untuk reset password
            $resetUrl = url('manajemen/reset-password/' . $token);

            // Kirim email reset password
            Mail::send([], [], function ($message) use ($user, $resetUrl) {
                $message->to($user->email)
                    ->subject('Reset Password')
                    ->html('Click the following link to reset your password: <a href="' . $resetUrl . '">Reset Password</a>');
            });

            // Berikan respons sukses
            return redirect()->route('manajemen.password.check-email')
                ->with('status', 'Link reset password telah dikirim ke email Anda.');
        }

        // Jika email tidak ditemukan
        return back()->withErrors(['email' => 'Email tidak ditemukan dalam sistem kami.']);
    }

    // Reset password
    public function reset(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Temukan user berdasarkan token dan email
        $user = User::where('email', $request->email)->where('reset_token', $request->token)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Token atau email tidak valid.']);
        }

        // Reset password user
        $user->password = Hash::make($request->password);
        $user->reset_token = null;  // Hapus token setelah reset
        $user->save();

        // Berikan respons sukses
        return redirect()->route('manajemen.login')->with('status', 'Password berhasil direset.');
    }
}
