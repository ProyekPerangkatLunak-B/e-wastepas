<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ResetPasswordManajemenController extends Controller
{
    // Menampilkan form reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('manajemen.registrasi.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Mengatur ulang password
    public function resetPassword(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        // Melakukan reset password
        $response = Password::reset(
            $validated,
            function ($user) use ($request) {
                // Memperbarui password user
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                // Autentikasi pengguna setelah reset password
                auth()->guard('web')->login($user); // Ganti 'web' dengan guard yang sesuai jika perlu
            }
        );

        // Cek jika reset password berhasil
        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('manajemen.password.reset-success')->with('status', trans($response));
        }

        // Jika reset gagal, tampilkan error dan arahkan kembali ke form
        return back()->withErrors(['email' => trans($response)]);
    }
}
