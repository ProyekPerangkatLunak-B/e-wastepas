<?php
namespace App\Http\Controllers\MitraKurir;
use App\Models\User;
use App\Models\UserOTP;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\OtpMail;
use App\Mail\PasswordResetMail;
use App\Models\UploadDocuments;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class RegistrasiMitraKurirController extends Controller
{
    public function EditProfileIndex(){
        $authedUser = Auth::user()->email;
        $user =  User::where('email',$authedUser)->first();
        return view('mitra-kurir/registrasi/account-profile/profile', compact("user"));
    }

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
    public function ForgotPasswordIndex(){
        return view('mitra-kurir/registrasi/forgot-password');
    }

    public function ChangePasswordIndex(){
        return  view('mitra-kurir/registrasi/account-profile/security');
    }

    public function ForgotPasswordFormIndex(Request $request){
        $token = $request->query('token');
        $email = $request->query('email');

        $tokenCache = Cache::get('password_reset'.$email);

        if(!$tokenCache || !$tokenCache == $token){
            return redirect('/')->withErrors(['token' => 'Invalid or expired token.']);
        }
        return view('mitra-kurir.registrasi.change-password', ['token' => $token, 'email' => $email]);
    }

    public function OtpRedirect($id_pengguna){
        $user = User::find($id_pengguna);
        return view('mitra-kurir.registrasi.otp-verification', compact('user'));
    }

    public function LoginAuth(Request $request)
{
    $messages = [
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Format email yang Anda masukkan tidak valid.',
        'kata_sandi.required' => 'Kata sandi harus diisi.',
    ];

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'kata_sandi' => ['required']
    ],$messages);

    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['kata_sandi'], $user->kata_sandi)) {
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('mitra-kurir.penjemputan.kategori');
    }

    return back()->withErrors([
        'email' => 'Password atau Email Salah',
    ]);

}

public function LogoutAuth(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('mitra-kurir.registrasi.login')->with('status', 'Berhasil Logout!');
}



    public function OtpValidation(Request $request){

        $otpInp = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

        $otp = UserOTP::where('otp_token',$otpInp)->where('otp_kadaluarsa','>',now())->first();
            if (!$otp) {
                return redirect()->back()->withErrors([
                    'otp_code' => 'OTP salah atau kadaluarsa'
                ]);
            }
    $otp->user->tanggal_email_diverifikasi = Date::now();
    $otp->user->save();
    $user = User::where('id_pengguna',$otp->id_pengguna)->first();
    Auth::login($user);
    $request->session()->regenerate();
    $otp->delete();

    return redirect()->route('upload-data-index', $otp->id_pengguna);
    }

    public function simpanData(Request $request)
{
    $messages = [
        'nama.required' => 'Nama lengkap harus diisi.',
        'nama.regex' => 'Nama Tidak Boleh Mengandung Simbol Atau Spesial Character',
        'KTP.required' => 'Nomor KTP harus diisi.',
        'KTP.min' => 'Nomor KTP harus terdiri dari minimal 16 digit.',
        'KTP.numeric' => 'Nomor KTP harus berupa angka.',
        'NomorHP.required' => 'Nomor HP harus diisi.',
        'NomorHP.min' => 'Nomor HP harus terdiri dari minimal 12 karakter.',
        'NomorHP.max' => 'Nomor HP tidak boleh lebih dari 14 karakter.',
        'Email.required' => 'Email harus diisi.',
        'Email.email' => 'Email yang Anda masukkan tidak valid.',
        'password.required' => 'Password harus diisi.',
        'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
        'ulangiPassword.required' => 'Ulangi password harus diisi.',
        'ulangiPassword.same' => 'Password konfirmasi tidak sama dengan password yang baru.',
        'ulangiPassword.min' => 'Password konfirmasi harus terdiri dari minimal 8 karakter.',
    ];

    $validateData = $request->validate([
        'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
        'KTP' => ['required', 'min:16', 'numeric'],
        'NomorHP' => ['required', 'min:12', 'max:14'],
        'Email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'ulangiPassword' => ['required', 'min:8', 'same:password']
    ], $messages);

    try {
        $user = User::create([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-_\@]+$/', 
            'nomor_ktp' => $validateData['KTP'],
            'nomor_telepon' => $validateData['NomorHP'],
            'email' => $validateData['Email'],
            'kata_sandi' => Hash::make($validateData['password']),
            'tanggal_dibuat' => now()
        ]);

        $otp = UserOTP::create([
            'id_pengguna' => $user->id_pengguna,
            'otp_token' => rand(1000, 9999),
            'otp_kadaluarsa' => Date::now()->addMinutes(5)
        ]);

        $user->notify(new OtpMail($otp->otp_token));

        return redirect()->route('otp-verification', $user->id_pengguna);

    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() === '23000') {
            $errorMessages = [];

            if (str_contains($e->getMessage(), 'email_unique')) {
                $errorMessages['email'] = 'Email Sudah terdaftar ';
            }

            if (str_contains($e->getMessage(), 'nomor_ktp_unique')) {
                $errorMessages['ktp'] = 'No KTP Sudah terdaftar';
            }
            return back()->withErrors($errorMessages);
        }
        return back()->withErrors(['error' => 'Ada kesalahan dalam proses registrasi']);
    }
}

    public function UploadValidation(Request $request, $id_pengguna)
{
    $user = User::find($id_pengguna);

    $messages = [
        'ktp.required' => 'File KTP harus diunggah.',
        'ktp.file' => 'KTP harus berupa file.',
        'ktp.mimes' => 'File KTP bukan jpeg, png, atau pdf.',
        'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 10MB.',

        'kk.required' => 'File KK harus diunggah.',
        'kk.file' => 'KK harus berupa file.',
        'kk.mimes' => 'File KK bukan jpeg, png, atau pdf.',
        'kk.max' => 'Ukuran file KK tidak boleh lebih dari 10MB.',

        'npwp.file' => 'NPWP harus berupa file.',
        'npwp.mimes' => 'File bukan jpeg, png, atau pdf.',
        'npwp.max' => 'Ukuran file NPWP tidak boleh lebih dari 10MB.',
    ];

    $request->validate([
        'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
        'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
        'npwp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
    ],$messages);

    $ktp = $request->file('ktp')->store('uploads/ktp', 'public');
    $kk = $request->file('kk')->store('uploads/kk', 'public');
    $npwp = $request->hasFile('npwp')
                     ? $request->file('npwp')->store('uploads/npwp', 'public')
                     : null;

    if ($request->hasFile('ktp')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,
            'tipe_dokumen' => 'KTP',
            'file_dokumen' => $ktp
        ]);
    }

    if ($request->hasFile('kk')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,  // Ensure user id is correct
            'tipe_dokumen' => 'KK',
            'file_dokumen' => $kk
        ]);
    }

    if ($request->hasFile('npwp')) {
        UploadDocuments::create([
            'id_pengguna' => $user->id_pengguna,  // Ensure user id is correct
            'tipe_dokumen' => 'NPWP',
            'file_dokumen' => $npwp
        ]);
    }
           return redirect()->route('mitra-kurir.registrasi.success-message');
   }

   public function SendForgotPassword(Request $request){
        $request -> validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email Tidak terdaftar'])->withInput();
        }
        $token = Str::random(64);

        Cache::put('password_reset'. $user->email, $token, now()->addMinutes(30));

        $resetLink = url('/mitra-kurir/registrasi/forgot-password-form?token=' . $token . '&email=' . $user->email);

        $user->notify(new PasswordResetMail($resetLink));
        return back()->with('status', 'Link reset telah dikirimkan ke email!');
   }

   public function ChangeForgotPassword(Request $request)
{
    $messages = [
        'password.required' => 'Password harus diisi.',
        'password.min' => 'Password harus terdiri dari minimal 8 karakter.',

        'ulangiPassword.required' => 'Ulangi password harus diisi.',
        'ulangiPassword.min' => 'Password konfirmasi harus terdiri dari minimal 8 karakter.',
        'ulangiPassword.same' => 'Password konfirmasi tidak sama dengan password yang baru.',
    ];

    $request->validate([
        'password' => 'required|min:8',
        'ulangiPassword' => 'required|min:8|same:password',
    ],$messages);

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return back()->withErrors(['email' => 'User not found.']);
    }

    $user->kata_sandi = Hash::make($request->password);
    $user->tanggal_update = now();
    $user->save();

    Cache::forget('password_reset' . $request->email);

    return redirect('mitra-kurir/registrasi/login')->with('status', 'Password berhasil di reset!');
}


public function ChangePassword(Request $request)
{
    $messages = [
        'PasswordOld.required' => 'Password lama harus diisi.',
        'PasswordOld.min' => 'Password lama harus terdiri dari minimal 8 karakter.',

        'PasswordNew.required' => 'Password baru harus diisi.',
        'PasswordNew.min' => 'Password baru harus terdiri dari minimal 8 karakter.',

        'passwordConfirm.required' => 'Konfirmasi password harus diisi.',
        'passwordConfirm.same' => 'Konfirmasi password tidak sama dengan password baru.',
    ];

    $request->validate([
        'PasswordOld' => 'required|min:8',
        'PasswordNew' => 'required|min:8',
        'passwordConfirm' => 'required|same:PasswordNew',
    ],$messages);

    $find = Auth::user()->email;

    $user = User::where('email',$find)->first();


    if (!$user) {
        return back()->withErrors(['email' => 'User not found.']);
    }
    if (!Hash::check($request->PasswordOld, $user->kata_sandi))  {
        return back()->withErrors(['email' => 'Password Lama Salah']);
    }

    $user->kata_sandi = Hash::make($request->PasswordNew);
    $user->tanggal_update = now();
    $user->save();

    return  back()->with('status', 'Password berhasil di ubah!');
}

public function UpdateProfile(Request $request){
    $messages = [
        'name.required' => 'Nama lengkap harus diisi.',
        'name.string' => 'Nama harus berupa teks.',
        'name.regex' => 'Nama Tidak Boleh Mengandung Simbol Atau Spesial Character',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'phone.string' => 'Nomor telepon harus berupa teks.',
        'phone.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
        'address.string' => 'Alamat harus berupa teks.',
        'address.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
        'tanggalLahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
        'noRekening.string' => 'Nomor rekening harus berupa teks.',
        'noRekening.max' => 'Nomor rekening tidak boleh lebih dari 50 karakter.',
        'photo.image' => 'Foto harus berupa gambar.',
        'photo.mimes' => 'Foto harus memiliki ekstensi: jpeg, png, atau jpg.',
        'photo.max' => 'Ukuran foto tidak boleh lebih dari 10MB.',
    ];

    $validateData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'nullable|string|min:12|max:20',
            'address' => 'nullable|string|max:255',
            'tanggalLahir' => 'nullable|date',
            'noRekening' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ],$messages);

        $find = Auth::user()->email;

        $user = User::where('email',$find)->first();

        $user->nama = $validateData['name'];
        $user->nomor_telepon = $validateData['phone'];
        $user->alamat = $validateData['address'];
        $user->tanggal_Lahir = $validateData['tanggalLahir'];
        $user->no_rekening = $validateData['noRekening'];

        if ($request->hasFile('photo')) {
            if ($user->foto_profil && Storage::exists('public/' . $user->foto_profil)) {
                Storage::delete('public/' . $user->foto_profil);
            }
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->foto_profil = $path;
        }

        $user->tanggal_update = now();
        $user->save();
        return redirect()->route('mitra-kurir.registrasi.success-message-data');
}

}
