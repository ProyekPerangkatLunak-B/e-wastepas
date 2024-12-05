<?php
namespace App\Http\Controllers\MitraKurir;
use App\Models\UserOTP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UploadDocuments;
use App\Models\User;
use App\Notifications\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;



class RegistrasiMitraKurirController extends Controller
{
    public function RegisterIndex(){
        return view('mitra-kurir.registrasi.register');
    }
    
    public function loginIndex(){
        return view('mitra-kurir.registrasi.login');
    }
    
    public function UploadDataIndex($id_pengguna){
        $user = User::find($id_pengguna);
        
        return view('mitra-kurir.registrasi.document-upload', compact("user"));
    }
    
    public function OtpRedirect($id_pengguna){
        $user = User::find($id_pengguna);
        return view('mitra-kurir.registrasi.otp-verification', compact('user'));
    }
    
    public function LoginAuth(Request $request)
    {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'kata_sandi' => ['required']
    ]);
        $user = User::where('email', $credentials['email'])->first();
            if ($user && Hash::check($credentials['kata_sandi'], $user->kata_sandi)) {
                Auth::login($user);

        $request->session()->regenerate();
            return redirect('mitra-kurir/penjemputan-sampah/kategori');
    }
    return back()->withErrors([
            'email' => 'Password atau Email Salah',
         ])->onlyInput('email');
    }


    public function OtpValidation(Request $request){

        $otpInp = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

        $otp = UserOTP::where('otp_token',$otpInp)->where('otp_kadaluarsa','>',now())->first();
            if (!$otp) {
                return redirect()->back()->withErrors([
                    'otp_code' => 'OTP CODE tidak ditemukan atau sudah kadaluarsa'
                ]);
            }
    $otp->user->tanggal_email_diverifikasi = Date::now();
    $otp->user->save();
    $otp->delete();

    return redirect()->route('upload-data-index', $otp->id_pengguna);
    }

    public function simpanData(Request $request)
    {
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
                'nomor_telepon' => $validateData['NomorHP'],
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

    public function UploadValidation(Request $request, $id_pengguna)
{
    $user = User::find($id_pengguna);

    $request->validate([
        'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', 
        'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',  
        'npwp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', 
    ]);

    // Save uploaded files
    $ktp = $request->file('ktp')->store('uploads/ktp', 'public');
    $kk = $request->file('kk')->store('uploads/kk', 'public');
    $npwp = $request->hasFile('npwp') 
                     ? $request->file('npwp')->store('uploads/npwp', 'public') 
                     : null;

    // Handle KTP upload
    if ($request->hasFile('ktp')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,  
            'tipe_dokumen' => 'KTP',
            'file_dokumen' => $ktp
        ]);
    }

    // Handle KK upload
    if ($request->hasFile('kk')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,  // Ensure user id is correct
            'tipe_dokumen' => 'KK',
            'file_dokumen' => $kk
        ]);
    }

    // Handle NPWP upload (optional)
    if ($request->hasFile('npwp')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,  // Ensure user id is correct
            'tipe_dokumen' => 'NPWP',
            'file_dokumen' => $npwp
        ]);
    }
    return redirect('mitra-kurir/registrasi/login');
   }
}
