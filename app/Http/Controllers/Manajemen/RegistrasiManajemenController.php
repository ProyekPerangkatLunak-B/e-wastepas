<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegistrasiManajemenController extends Controller
{
    // Fungsi untuk menampilkan halaman registrasi
    public function showRegistrationForm()
    {
        return view('manajemen.registrasi.register');
    }

    // Fungsi untuk menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Opsi: Kirim kode OTP atau link verifikasi email di sini

        // Setelah registrasi, arahkan ke halaman konfirmasi akun
        return redirect()->route('confirm-account');
    }

    // Fungsi untuk menampilkan halaman konfirmasi akun
    public function showConfirmAccountForm()
    {
        return view('manajemen.registrasi.confirm-account');
    }

    // Fungsi untuk memverifikasi kode OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        // Logika untuk verifikasi kode OTP
        if ($request->otp == '1234') { // Contoh, sesuaikan dengan mekanisme penyimpanan OTP yang sebenarnya
            return redirect()->route('confirmation-success');
        }

        return back()->withErrors(['otp' => 'Kode OTP salah.']);
    }

    // Fungsi untuk menampilkan halaman sukses konfirmasi
    public function showConfirmationSuccess()
    {
        return view('manajemen.registrasi.confirmation-success');
    }

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
            return redirect()->route('manajemen.password.check-email');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    // Fungsi untuk menangani reset password dari form
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
    }
}
