<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\UserMasyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginMasyarakat extends Controller
{
    public function authenticate(Request $request)
    {
        // Validasi input
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        // Jika validasi gagal, kembali ke halaman login dengan error
        return view('masyarakat.registrasi.login', [
            'errors' => $validator->errors()
        ]);
    }

    // Cari pengguna berdasarkan email
    $user = UserMasyarakat::where('email', $request->email)->first();

    // Cek apakah pengguna ditemukan dan password sesuai
    if ($user && Hash::check($request->password, $user->password)) {
        
        if ($user->id_peran != 2) {
            return back()->withErrors([
                'email' => 'Akun ini tidak memiliki akses untuk login sebagai masyarakat.',
            ]);
        }

        // Login pengguna dan regenerasi sesi
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect ke halaman penjemputan sampah/kategori
        return redirect()->route('masyarakat.penjemputan.kategori')->with('success', 'Login berhasil.');
    }

    // Jika login gagal
    return back()->withErrors([
        'email' => 'Email tidak terdaftar',
        'password' => 'Password tidak sesuai',
    ]);
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        $request->session()->invalidate(); // Invalidate session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('masyarakat.login')->with('status', 'Logout berhasil.');
    }
}
