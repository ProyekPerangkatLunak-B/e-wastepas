<?php

namespace App\Http\Controllers\Manajemen;

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
            ->where('otp_token', $request->otp) // Nama kolom harus sesuai dengan database
            ->where('expires_at', '>', now()) // OTP belum kedaluwarsa
            ->first();

        // Jika OTP ditemukan dan valid
        if ($otp) {
            // Logika untuk membuat user baru
            User::create([
                'name' => $request->session()->get('register_data.name'),
                'email' => $request->email,
                'nomor_telepon' => $request->session()->get('register_data.nomor_telepon'),
                'password' => Hash::make($request->session()->get('register_data.password')),
            ]);

            // Hapus OTP setelah verifikasi berhasil
            $otp->delete();

            // Redirect ke halaman konfirmasi sukses
            return redirect()->route('manajemen.registrasi.otp-confirmation-success')
                ->with('success', 'OTP berhasil diverifikasi!');
        }

        // Jika OTP tidak valid
        return redirect()->back()->withErrors(['otp' => 'Kode OTP salah atau sudah kedaluwarsa'])->withInput();
    }
}
