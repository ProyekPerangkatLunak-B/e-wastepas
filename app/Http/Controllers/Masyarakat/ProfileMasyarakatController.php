<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserMasyarakat;

class ProfileMasyarakatController extends Controller
{
    /**
     * Menampilkan halaman profil.
     */
    public function showProfile()
    {
        // Asumsi user yang login disimpan di session atau middleware yang relevan
        $user = UserMasyarakat::find(session('user_id')); // Gunakan session untuk mendapatkan ID pengguna
        if (!$user) {
            return redirect()->route('masyarakat.login')->with('error', 'Harap login terlebih dahulu.');
        }
        return view('masyarakat.profile.show', compact('user'));
    }

    /**
     * Menampilkan form edit profil.
     */
    public function editProfile()
    {
        $user = UserMasyarakat::find(session('user_id')); // Gunakan session untuk mendapatkan ID pengguna
        if (!$user) {
            return redirect()->route('masyarakat.login')->with('error', 'Harap login terlebih dahulu.');
        }
        return view('masyarakat.profile.edit', compact('user'));
    }

    /**
     * Memproses pembaruan profil pengguna.
     */
    public function updateProfile(Request $request)
    {
        $user = UserMasyarakat::find(session('user_id')); // Gunakan session untuk mendapatkan ID pengguna
        if (!$user) {
            return redirect()->route('masyarakat.login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:pengguna,email,' . $user->id_pengguna . ',id_pengguna',
            'kata_sandi' => 'nullable|min:6|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:15',
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Update data pengguna
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nomor_telepon = $request->nomor_telepon;

        // Perbarui kata sandi jika diisi
        if ($request->kata_sandi) {
            $user->kata_sandi = bcrypt($request->kata_sandi);
        }

        // Jika ada foto profil diunggah, proses upload
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan foto baru
            $path = $request->file('foto_profil')->store('profile_pictures', 'public');
            $user->foto_profil = $path;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('masyarakat.profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
