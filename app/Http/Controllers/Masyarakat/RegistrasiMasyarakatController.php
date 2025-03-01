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
        $messages = [
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama sudah terdaftar',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus sesuai format, example@gmail.com',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email ini sudah terdaftar.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 10 karakter.',

            'nomor_ktp.required' => 'Nomor KTP wajib diisi.',
            'nomor_ktp.numeric' => 'Nomor KTP harus berupa angka.',
            'nomor_ktp.digits' => 'Nomor KTP harus terdiri dari 16 digit',
            'nomor_ktp.unique' => 'Nomor KTP sudah terdaftar',

            'tel.required' => 'Nomor telepon wajib diisi.',
            'tel.numeric' => 'Nomor telepon harus berupa angka.',
            'tel.unique' => 'Nomor telepon sudah terdaftar',
        ];

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:pengguna,nama',
            'email' => 'required|email|max:255|unique:pengguna,email',
            'password' => 'required|min:10',
            'nomor_ktp' => 'required|numeric|digits:16|unique:pengguna',
            'tel' => 'required|numeric',
        ], $messages);

        // Simpan pengguna di database
        $pengguna = Pengguna::create([
            'nama' => $request->name,
            'email' => $request->email,
            'kata_sandi' => Hash::make($request->password),
            'id_peran' => 2, // Asumsi 2 adalah ID peran default
            'nomor_ktp' => $request->nomor_ktp,
            'nomor_telepon' => $request->tel,
            'status_verifikasi' => 'Diproses',
        ]);

        // Simpan id_pengguna di sesi
        session(['id_pengguna' => $pengguna->id_pengguna]);

        // Buat kode OTP
        $otpCode = str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);

        // Buat entri OTP dengan `id_penggu      //na`
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
