<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Notifications\OtpMail;
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
        'email' => 'required|string|email|max:255|unique:pengguna,email',
        'password' => 'required|string|min:8',
    ]);

    // Simpan pengguna di database
    $pengguna = Pengguna::create([
        'nama' => $request->name,
        'email' => $request->email,
        'kata_sandi' => Hash::make($request->password),
    ]);

    // Buat kode OTP
    $otpCode = str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);


    // Buat entri OTP dengan `id_pengguna`
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

            //email
            // Asumsikan Anda sudah membuat OTP dan menyimpannya di database
            $otp = mt_rand(1000, 9999); // Contoh membuat OTP
        
            // Kirim OTP ke email user
        }

        return back()->withErrors(['otp' => 'Invalid OTP code.']); // Sesuaikan dengan nama input yang benar
        
             //otp ke email
             $otpCode = Str::random(4); // Buat kode OTP


             // Buat entri OTP baru
            OtpMail::create([
            'email' => $request->email,
            'otp' => $otpCode,
            'expires_at' => now()->addMinutes(10), // Set waktu kedaluwarsa
            ]);

            // Kirim email dengan OTP ke pengguna
            Mail::to($request->email)->send(new OtpMail($OtpMail));

            return view('masyarakat.registrasi.verify_otp');
      

    }

}