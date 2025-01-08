<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Notifications\OtpMail;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'password' => 'required|string|min:10',
            'ktp' => 'required|string|min:16|max:16|',
            'tel' => 'required|string|min:10|max:13',
        ]);

        // Simpan pengguna di database
        $pengguna = Pengguna::create([
            'nama' => $request->name,
            'email' => $request->email,
            'kata_sandi' => Hash::make($request->password),
            'id_peran' => 2, // Asumsi 2 adalah ID peran default
            'nomor_ktp' => $request->ktp,
            'nomor_telepon' => $request->tel,
            'status_verifikasi' => 'Diproses',
        ]);

        // Simpan id_pengguna di sesi
        session(['id_pengguna' => $pengguna->id_pengguna]);

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

        // Redirect ke halaman OTP
        return redirect()->route('masyarakat.otp')->with('email', $request->email);
    }

    public function showOtpForm()
    {
        return view('masyarakat.registrasi.verify_otp');
    }

    public function verifyOtp(Request $request)
    {
        // Validasi input
        $request->validate([
            'otp' => 'required|string',
        ]);

        // Ambil id_pengguna dari sesi
        $id_pengguna = session('id_pengguna');

        if (!$id_pengguna) {
            return redirect()->route('masyarakat.register')->withErrors('Sesi berakhir. silahkan registrasi ulang!.');
        }

        // Cari entri OTP yang sesuai
        $otp = Otp::where('otp_token', $request->otp)
            ->where('otp_kadaluarsa', '>=', now())
            ->where('otp_status', 0)
            ->where('id_pengguna', $id_pengguna)
            ->first();

        if ($otp) {
            // Update status OTP
            $otp->otp_status = 1;
            $otp->save();

            // Bersihkan sesi
            session()->forget('id_pengguna');

            return redirect()->route('masyarakat.login')->with('status', 'OTP berhasil di verifikasi.');
        } else {
            return redirect()->back()->withErrors('OTP Salah.');
        }
    }
}