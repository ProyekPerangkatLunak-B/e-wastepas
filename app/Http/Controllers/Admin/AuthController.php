<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\LoginLinkMail;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function sendLoginLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = htmlspecialchars($request->input('email'), ENT_QUOTES, 'UTF-8');

        $loginAttemptsKey = 'login_attempts:' . $email;
        $blockKey = 'blocked_email:' . $email;

        $response = null;

        if (Cache::has($blockKey)) {
            $response = back()->withErrors(['email' => 'Email Anda telah diblokir sementara karena terlalu banyak percobaan login. Coba lagi nanti.']);
        } else {
            $attempts = Cache::get($loginAttemptsKey, 0);

            if ($attempts >= 5) {
                Cache::put($blockKey, true, now()->addMinutes(15));
                Cache::forget($loginAttemptsKey);
                $response = back()->withErrors(['email' => 'Email Anda telah diblokir sementara karena terlalu banyak percobaan login. Coba lagi nanti.']);
            } else {
                Cache::put($loginAttemptsKey, $attempts + 1, now()->addMinutes(15));

                $pengguna = Pengguna::where('email', $email)
                    ->where('id_peran', 1)
                    ->first();

                if (!$pengguna) {
                    $response = back()->withErrors(['email' => 'Email tidak ditemukan atau tidak memiliki akses sebagai admin.']);
                } else {
                    Cache::forget($loginAttemptsKey);

                    $loginUrl = URL::temporarySignedRoute(
                        'admin.login.verify',
                        now()->addMinutes(30),
                        ['email' => $email]
                    );

                    $namaPengguna = $pengguna->nama ?? 'Pengguna';

                    $ipAddress = $request->ip();

                    $location = $this->getGeolocation($ipAddress);

                    Mail::to($email)->send(new LoginLinkMail($loginUrl, $namaPengguna, $ipAddress, $location));

                    $response = back()->with('status', 'Link login telah dikirim ke email Anda.');
                }
            }
        }

        return $response;
    }

    protected function getGeolocation($ip)
    {
        $apiUrl = "http://ip-api.com/json/{$ip}?fields=city,regionName,country";

        try {
            $response = file_get_contents($apiUrl);
            $data = json_decode($response, true);

            if ($data && $data['status'] === 'success') {
                return "{$data['city']}, {$data['regionName']}, {$data['country']}";
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    public function verifyLogin(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = Pengguna::where('email', $request->email)->firstOrFail();
        Auth::login($user);

        return redirect()->intended('admin/datamaster/masyarakat');
    }
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Hapus sesi pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect()->route('admin.login.index')->with('status', 'Anda telah keluar.');
    }
}
