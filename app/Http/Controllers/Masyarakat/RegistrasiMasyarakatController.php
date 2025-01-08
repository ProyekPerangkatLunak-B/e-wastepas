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
    $messages = [
        'name.string' => 'Nama harus berupa teks.',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

        'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka.',
        'nomor_telepon.unique' => 'Nomor telepon ini sudah terdaftar.',

        'nomor_ktp.numeric' => 'Nomor KTP harus berupa angka.',
        'nomor_ktp.unique' => 'Nomor KTP ini sudah terdaftar.',
        'nomor_ktp.digits' => 'Nomor KTP harus terdiri dari 16 digit.',

        'email.email' => 'Email harus sesuai format, example@gmail.com',
        'email.unique' => 'Email ini sudah terdaftar.',

        'password.min' => 'Password harus terdiri dari minimal 10 karakter.',
    ];

    $request->validate([
        'name' => 'required|string|max:255',
        'nomor_telepon' => 'required|numeric|unique:pengguna,nomor_telepon',
        'nomor_ktp' => 'required|numeric|unique:pengguna,nomor_ktp|digits:16',
        'email' => 'required|email|unique:pengguna,email',
        'password' => 'required|min:10',
    ], $messages);


    // Simpan pengguna di database
    $pengguna = Pengguna::create([
        'nama' => $request->name,
        'nomor_telepon' => $request->nomor_telepon,
        'nomor_ktp' => $request->nomor_ktp,
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

    public function resetPassword (Request $request)
    {
            $messages = [
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password harus terdiri dari minimal 8 karakter.',

                'ulangiPassword.required' => 'Ulangi password harus diisi.',
                'ulangiPassword.min' => 'Password konfirmasi harus terdiri dari minimal 8 karakter.',
                'ulangiPassword.same' => 'Password konfirmasi tidak sama dengan password yang baru.',
            ];

            $request->validate([
                'password' => 'required|min:8',
                'ulangiPassword' => 'required|min:8|same:password',
            ],$messages);

    }

}
