<?php

namespace App\Http\Controllers\Manajemen;

use App\Models\Otp;
use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:13',
            'email' => 'required|string|email|max:255|unique:pengguna,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        // Periksa apakah email sudah digunakan
        $user = Pengguna::where('email', $request->email)->first();

        if ($user) {
            // Jika email sudah digunakan, kembalikan dengan pesan kesalahan
            return redirect()->back()->withErrors(['email' => 'Email sudah digunakan']);
        }

        // Simpan pengguna di database
        $pengguna = Pengguna::create([
            'nama' => $request->name,
            'nomor_telepon' => $request->phone,
            'email' => $request->email,
            'kata_sandi' => Hash::make($request->password),
        ]);

        // Buat kode OTP
        $otpCode = random_int(100000, 999999);

        // Buat entri OTP dengan id_pengguna
        Otp::create([
            'id_pengguna' => $pengguna->id_pengguna, // Gunakan ID pengguna
            'otp_token' => $otpCode,
            'otp_kadaluarsa' => now()->addMinutes(10),
            'otp_status' => 0, // Status awal OTP, misal 0 untuk belum diverifikasi
        ]);

        // Kirim email dengan OTP ke pengguna
        Mail::raw("Your OTP code is: $otpCode", function ($message) use ($request) {
            $message->to($request->email)->subject('OTP Verification');
        });

        // dd($pengguna);

        return redirect()
            ->route('manajemen.registrasi.login')
            ->with('email', $request->email);
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
