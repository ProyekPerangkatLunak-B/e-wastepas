<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ResetPasswordManajemenController extends Controller
{
    /**
     * Menampilkan form reset password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        if (!$token || !$request->query('email')) {
            abort(404); // Jika token atau email tidak valid, tampilkan error 404
        }

        return view('manajemen.registrasi.reset-password', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }


    /**
     * Mengatur ulang password pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        // Proses reset password
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Update password dengan hashing
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                // Autentikasi pengguna setelah reset password (opsional)
                Auth::guard('web')->login($user);
            }
        );

        // Jika reset berhasil, arahkan ke halaman login dengan pesan sukses
        if ($response === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __('Password berhasil direset! Silakan login.'));
        }

        // Jika gagal, kembalikan dengan pesan error
        return back()->withErrors(['email' => __('Token reset password tidak valid atau kedaluwarsa.')]);
    }
}
