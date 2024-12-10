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
        // Menampilkan halaman reset password dengan token dan email
        return view('manajemen.registrasi.reset-password', [
            'token' => $token,
            'email' => $request->query('email') // Mengambil email dari query parameter
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
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // Proses reset password
        $response = Password::reset(
            $validated,
            function ($user) use ($request) {
                // Update password dengan hashing
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                // Autentikasi pengguna setelah reset password
                Auth::guard('web')->login($user);
            }
        );

        // Cek apakah reset berhasil
        if ($response === Password::PASSWORD_RESET) {
            return redirect()->route('manajemen.password.reset-success')
                ->with('status', __('Password berhasil direset!'));
        }

        // Jika gagal, kembalikan dengan pesan error
        return back()->withErrors(['email' => __($response)]);
    }

    /**
     * Menampilkan halaman sukses reset password.
     *
     * @return \Illuminate\View\View
     */
    public function showResetSuccess()
    {
        return view('manajemen.registrasi.reset-password');
    }
}
