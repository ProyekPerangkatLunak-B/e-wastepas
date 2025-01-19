<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('manajemen.registrasi.login');
    }

    // Fungsi untuk menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba autentikasi dengan data yang diberikan
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, arahkan ke dashboard atau halaman lain
            return redirect()->intended('/manajemen/datamaster/dashboard')
                ->with(['success', 'Anda Berhasil Telah Login']); // Sesuaikan dengan halaman tujuan
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->with([
            'error',
            'Email atau password salah.',
        ]);
    }

    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('manajemen.registrasi.login')->with('success', 'Anda Telah Berhasil Logout');
    }
}
