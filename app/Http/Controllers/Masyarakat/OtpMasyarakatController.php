<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OtpMasyarakatController extends Controller
{
    public function verifyOtp(Request $request)
{


    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'otp' => 'required|string|max:6', // Pastikan ini sesuai dengan input OTP
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $otp = Otp::where('email', $request->email)
              ->where('otp', $request->otp) // Pastikan ini menggunakan nama kolom yang benar
              ->where('expires_at', '>', now()) // Pastikan OTP belum kedaluwarsa
              ->first();

    if ($otp) {
        // Logika untuk membuat user
        User::create([
            'name' => $request->session()->get('register_data.name'),
            'email' => $request->email,
            'password' => Hash::make($request->session()->get('register_data.password')),
        ]);

        // Hapus OTP setelah verifikasi berhasil
        $otp->delete();

        return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
    }

    return redirect()->back()->withErrors(['otp' => 'Invalid OTP code'])->withInput();
}

}
