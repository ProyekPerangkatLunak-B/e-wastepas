<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\UserMasyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginMasyarakat extends Controller
{
    public function authenticate(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman login dengan error
            return view('masyarakat.registrasi.login', [
                'errors' => $validator->errors()
            ]);
        }

        // Cek apakah kredensial valid menggunakan Auth::attempt()
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            $request->session()->regenerate(); // Regenerasi session untuk keamanan

            // Debug untuk memastikan bahwa route yang dihasilkan benar
            Auth::login(UserMasyarakat::where('email', $request->email)->first());


            // Jika login berhasil, redirect ke halaman penjemputan-sampah/kategori
            return redirect()->route('masyarakat.penjemputan.kategori')->with('success', 'Login berhasil.');
        } else {
            // **Error Handling yang Lebih Baik**
            return back()->withErrors([
                'email_or_password' => 'Email atau Password tidak sesuai.',
            ]);
        }
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
