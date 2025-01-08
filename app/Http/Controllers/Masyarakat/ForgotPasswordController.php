<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input email
        $request->validate(['email' => 'required|email']);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate reset token
            $token = Str::random(60);

            // Simpan token yang telah dienkripsi di kolom password (atau gunakan tabel terpisah jika ada)
            $user->kata_sandi = Hash::make($token);
            $user->save();

            // Generate reset URL
            $resetUrl = url('masyarakat/reset/' . $token . '?email=' . urlencode($user->email));

            // Kirim email reset password

            Mail::send([], [], function ($message) use ($user, $resetUrl) {
                $message->to($user->email)
                    ->subject('Reset Password')
                    ->html('silahkan klik link reset password: <a href="' . $resetUrl . '">Reset Password</a>');
            });
            // Berikan respons sukses
            return back()->with(['status' => 'Link reset password telah dikirim ke email Anda.']);
        }

        // Jika email tidak ditemukan
        return back()->withErrors(['email' => 'Email tidak ditemukan dalam sistem kami.']);
    }

    public function showResetForm($token, Request $request)
    {
        $email = $request->query('email');

        // Simpan email ke sesi
        $request->session()->put('email', $email);

        return view('masyarakat/registrasi/reset-password', ['token' => $token, 'email' => $email]);
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password_lama' => 'required|string|min:10',
            'password_baru' => 'required|string|min:10|confirmed',
        ]);

        // Cek apakah password lama sesuai dengan yang ada di database
        if (!Hash::check($request->password_lama, Auth::user()->kata_sandi)) {
            return redirect()->back()->with('error', 'Password lama salah.');
        }

        $user = Auth::user();
        $user = User::findOrFail($user->id_pengguna); // Ensure $user is an instance of the User model
        $user->kata_sandi = Hash::make($request->password_baru);
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('masyarakat.profile')->with('success', 'Password berhasil diubah.');
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil email dari sesi
        $email = $request->session()->get('email');

        if (!$email) {
            return back()->with('error', 'Email tidak ditemukan di sesi. Silakan ulangi proses reset password.');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Update password
        $user->kata_sandi = Hash::make($request->password);
        $user->save();

        // Hapus email dari sesi setelah selesai
        $request->session()->forget('email');

        return redirect()->route('masyarakat.login')->with('status', 'Berhasil Reset Status.');
    }
}