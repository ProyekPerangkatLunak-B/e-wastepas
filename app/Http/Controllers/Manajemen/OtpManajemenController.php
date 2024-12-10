<?php

namespace App\Http\Controllers\Manajemen; // Ubah namespace menjadi Manajemen

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OtpManajemenController extends Controller
{
    public function verifyOtp(Request $request)
    {
        // Validasi input OTP
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|max:6', // Pastikan ini sesuai dengan input OTP
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mencari OTP berdasarkan email dan kode OTP yang dimasukkan
        $otp = Otp::where('email', $request->email)
            ->where('otp', $request->otp) // Pastikan ini menggunakan nama kolom yang benar
            ->where('expires_at', '>', now()) // Pastikan OTP belum kedaluwarsa
            ->first();

        // Jika OTP ditemukan dan valid
        if ($otp) {
            // Logika untuk membuat user baru
            User::create([
                'name' => $request->session()->get('register_data.name'),
                'email' => $request->email,
                'nomor_telepon' => $request->nomor_telepon,
                'password' => Hash::make($request->session()->get('register_data.password')),
            ]);

            // Hapus OTP setelah verifikasi berhasil
            $otp->delete();

            return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
        }

        // Jika OTP tidak valid
        return redirect()->back()->withErrors(['otp' => 'Invalid OTP code'])->withInput();
    }
}
