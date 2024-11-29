<?php

namespace App\Http\Controllers\MitraKurir;

use App\Models\UserOTP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;


class RegistrasiMitraKurirController extends Controller
{
    public function index()
    {
        return view('mitra-kurir.registrasi.register');
    }
public function LoginAuth(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'email' => ['required', 'email'],
        'kata_sandi' => ['required', 'string', 'min:8'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['kata_sandi']], $request->has('remember'))) {
        // Regenerasi sesi untuk menghindari session fixation
        $request->session()->regenerate();
        return view('mitra-kurir.penjemputan-sampah.kategori');
    }

    // Jika gagal, kembalikan pesan error
    return back()->withErrors([
        'email' => 'Email atau kata sandi tidak sesuai.',
    ])->withInput($request->except('kata_sandi'));
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
            'otp_code' => 'OTP CODE tidak ditemukan atau sudah kadaluarsa'
        ]);
    }
    $otp->user->tanggal_email_diverifikasi = Date::now();
    $otp->user->save();
    $otp->delete();

    return redirect('mitra-kurir/registrasi/document-upload');
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



            $user->notify(new OtpMail($otp->otp_token));


            return redirect()->route('otp-verification', $user->id_pengguna);

        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                $errorMessages = [];

                if (str_contains($e->getMessage(), 'email_unique')) {
                    $errorMessages['email'] = 'Email already taken.';
                }
        
                if (str_contains($e->getMessage(), 'nomor_ktp_unique')) {
                    $errorMessages['ktp'] = 'No KTP already taken.';
                }
        

                return back()->withErrors($errorMessages);
            }

            return back()->withErrors(['error' => 'An error occurred during registration.']);
        }
    }


}