<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginMasyarakat extends Controller
{
    public function login()
    {
        return view('masyarakat.registrasi.login');
    }
      
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
    
        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // Jika email tidak ditemukan
            return view('masyarakat.registrasi.login', [
                'error_message' => 'Email tidak ditemukan.',
            ]);
        }
    
        // Cek apakah password cocok
        if (!Auth::validate(['email' => $request->email, 'password' => $request->password])) {
            // Jika password salah
            return view('masyarakat.registrasi.login', [
                'error_message' => 'Password salah.',
            ]);
        }
    
        // Jika email dan password valid, lakukan login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // Regenerasi session untuk keamanan
            return redirect()->intended('dashboard')->with('success', 'Login berhasil.');
        }
    
        // Default fallback jika login gagal (seharusnya tidak tercapai)
        return view('masyarakat.registrasi.login', [
            'error_message' => 'Terjadi kesalahan saat login. Silakan coba lagi.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('masyarakat.registrasi.register'); 
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Optionally, log the user in after registration
        // Auth::login($user);

        // Redirect to the login page with a success message
        return redirect()->route('masyarakat.login')->with('success', 'Registration successful. Please log in.');
    }
}
