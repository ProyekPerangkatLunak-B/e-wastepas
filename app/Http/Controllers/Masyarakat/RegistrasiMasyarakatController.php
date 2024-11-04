<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegistrasiMasyarakatController extends Controller
{
    public function showRegistrationForm()
    {
        return view('masyarakat.registrasi.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8', // Menggunakan 'confirmed' jika ada konfirmasi password
        ]);

        $otpCode = Str::random(6);
        
        // Buat entri OTP baru
        Otp::create([
            'email' => $request->email,
            'otp' => $otpCode,
            'expires_at' => now()->addMinutes(10), // Set waktu kedaluwarsa
        ]);

        // Kirim email dengan OTP ke pengguna
        Mail::raw("Your OTP code is: $otpCode", function ($message) use ($request) {
            $message->to($request->email)->subject('OTP Verification');
            // Email ini hanya akan dicatat di log
        });

        // Simpan data pendaftaran di session
        $request->session()->put('register_data', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        return redirect()->route('masyarakat.otp')->with('email', $request->email);
    }

    public function showOtpForm()
    {
        return view('masyarakat.registrasi.verify_otp');
    }

    public function verifyOtp(Request $request)
    {
        // Validasi input OTP
        $request->validate([
            'otp' => 'required|string',
        ]);

        // Ambil data OTP dari database berdasarkan email
        $otp = Otp::where('email', $request->session()->get('register_data.email')) // Menggunakan email dari session
            ->where('otp', $request->otp) // Sesuaikan nama kolom
            ->where('expires_at', '>', now()) // Pastikan OTP belum kadaluarsa
            ->first();

        if ($otp) {
            // Ambil data registrasi dari session
            $registerData = $request->session()->get('register_data');

            // Buat pengguna baru
            User::create([
                'name' => $registerData['name'],
                'email' => $registerData['email'],
                'password' => $registerData['password'], // Password yang sudah di-hash
            ]);

            // Hapus data registrasi dari session
            $request->session()->forget('register_data');
            // Hapus OTP setelah berhasil diverifikasi
            $otp->delete();

            return redirect()->route('masyarakat.login')->with('success', 'Registration successful! You can now login.');
        }

        return back()->withErrors(['otp' => 'Invalid OTP code.']); // Sesuaikan dengan nama input yang benar
    }

}
