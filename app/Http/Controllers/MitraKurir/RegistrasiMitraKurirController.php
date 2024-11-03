<?php

namespace App\Http\Controllers\MitraKurir;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // alert login

class RegistrasiMitraKurirController extends Controller
{
    public function index()
    {
        return view('mitra-kurir.registrasi.register');
    }

    public function loginIndex()
    {
        return view('mitra-kurir.registrasi.login');
    }

    public function simpanData(Request $request)
    {

        // dd($request->all());

        $validateData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'KTP' => ['required', 'min:16'],
            'NomorHP' => ['required', 'min:12', 'max:14'],
            'Email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'ulangiPassword' => ['required', 'min:8', 'same:password']
        ]);

        try {
            User::create([
                'name' => $validateData['nama'],
                'username' => $validateData['username'], // Include username
                'no_ktp' => $validateData['KTP'], // Include no_ktp
                'no_hp' => $validateData['NomorHP'],
                'email' => $validateData['Email'],
                'password' => Hash::make($validateData['password'])
            ]);

            return back()->with('success', 'Registrasi berhasil!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                $errorMessages = [];

                if (str_contains($e->getMessage(), 'username_unique')) {
                    $errorMessages['username'] = 'Username already taken.';
                }

                if (str_contains($e->getMessage(), 'email_unique')) {
                    $errorMessages['email'] = 'Email already taken.';
                }

                if (str_contains($e->getMessage(), 'no_ktp_unique')) {
                    $errorMessages['KTP'] = 'No KTP already taken.';
                }

                return back()->withErrors($errorMessages);
            }

            return back()->withErrors(['error' => 'An error occurred during registration.']);
        }
    }

    // alert login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',    
            'password.min' => 'Password must be at least 8 characters long.', 
        ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }
}
