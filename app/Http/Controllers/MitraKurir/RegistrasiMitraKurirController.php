<?php

namespace App\Http\Controllers\MitraKurir;

use App\Models\User;
use App\Models\UserOTP;
use App\Models\otp_cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegistrasiMitraKurirController extends Controller
{
    public function index()
    {
        return view('mitra-kurir.registrasi.register');
    }

    public function LoginAuth(Request $request){
       $credentials =  $request -> validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function loginIndex()
    {
        return view('mitra-kurir.registrasi.login');
    }

    public function OtpRedirect($user_id){
        $user = User::find($user_id);
        return view('mitra-kurir.registrasi.otp-verification', compact('user'));
    }

    public function OtpValidation($user_id, Request $request){
        $otp = UserOTP::where('otp_code', $request->otp_code)->where('expired_at','>',now())->first();
    if (!$otp) {
        return redirect()->back()->withErrors([
            'otp_code' => 'OTP CODE tidak ditemukan.'
        ]);
    }

    $otp->user->email_verified_at = Date::now();
    $otp->user->save();
    
    return redirect('mitra-kurir/registrasi/login');
    }

    public function simpanData(Request $request)
    {
        // dd($request->all())
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
         $user = User::create([
                'name' => $validateData['nama'],
                'username' => $validateData['username'], 
                'no_ktp' => $validateData['KTP'], 
                'no_hp' => $validateData['NomorHP'],
                'email' => $validateData['Email'],
                'password' => Hash::make($validateData['password'])
            ]);
            
            $otp = UserOTP::create([
                'user_id' => $user->id,
                'otp_code' => rand(1000,9999),
                'expired_at' => Date::now()->addMinutes(5)
            ]);
            
            event(new Registered($user));
            
            return redirect()->route('otp-verification', $user->id);

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

  
}
