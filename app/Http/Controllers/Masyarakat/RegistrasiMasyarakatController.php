<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiMasyarakatController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_masyarakats',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = UserMasyarakat::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'otp' => Str::random(6),
        ]);

        // // Kirim email OTP
        Mail::to($user->email)->send(new \App\Mail\OtpMail($user));

        return response()->json(['message' => 'Registration successful. Please check your email for the OTP.']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'otp' => 'required|string|size:6',
        ]);

        $user = UserMasyarakat::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password) && $user->otp === $request->otp) {
            Auth::login($user);
            return response()->json(['message' => 'Login successful.']);
        }

        // return response()->json(['message' => 'Invalid credentials or OTP.'], 401);
    }

}

