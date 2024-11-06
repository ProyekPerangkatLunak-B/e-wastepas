<?php

namespace App\Http\Controllers\MitraKurir;

use App\Models\UserOTP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class RegistrasiMitraKurirController extends Controller
{
    public function index()
    {
        return view('mitra-kurir.registrasi.register');
    }

    public function LoginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'kata_sandi' => ['required']
        ]);
    
        Log::info('Attempting login with:', ['email' => $credentials['email'], 'password' => $credentials['kata_sandi']]);


        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['kata_sandi']])) {
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

    public function OtpRedirect($id_pengguna){
        $user = User::find($id_pengguna);
        return view('mitra-kurir.registrasi.otp-verification', compact('user'));
    }

    public function OtpValidation($id_pengguna, Request $request){
        $otp = UserOTP::where('otp_token', $request->otp_token)->where('otp_kadaluarsa','>',now())->first();
    if (!$otp) {
        return redirect()->back()->withErrors([
            'otp_code' => 'OTP CODE tidak ditemukan.'
        ]);
    }

    $otp->user->tanggal_email_diverifikasi = Date::now();
    $otp->user->save();
    $otp->delete();
    
    return redirect('mitra-kurir/registrasi/login');
    }

    public function simpanData(Request $request)
    {
        // dd($request->all())
        $validateData = $request->validate([
            'nama' => 'required',
            'KTP' => ['required', 'min:16','numeric'],
            'NomorHP' => ['required', 'min:12', 'max:14'],
            'Email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'ulangiPassword' => ['required', 'min:8', 'same:password']
        ]);
        try {
         $user = User::create([
                'nama' => $validateData['nama'],
                'nomor_ktp' => $validateData['KTP'], 
                'nomor_hp' => $validateData['NomorHP'],
                'email' => $validateData['Email'],
                'kata_sandi' => Hash::make($validateData['password']),
                'tanggal_dibuat' => now()
            ]);
            
            $otp = UserOTP::create([
                'id_pengguna' => $user->id_pengguna,
                'otp_token' => rand(1000,9999),
                'otp_kadaluarsa' => Date::now()->addMinutes(5)
            ]);
            
            event(new Registered($user));
            
            return redirect()->route('otp-verification', $user->id_pengguna);

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
