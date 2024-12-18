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
        return view('masyarakat.registrasi.profile.show'); // Hanya menampilkan halaman profil
    }

    /**
     * Memproses penyimpanan atau pembaruan data profil pengguna.
     */
    public function saveProfile(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama' => 'required|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'nomor_telepon' => 'nullable|string|max:15',
            'no_rekening' => 'nullable|string|max:30',
            'alamat' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Jika pengguna ID dikirimkan, update; jika tidak, buat pengguna baru
        $user = UserMasyarakat::find($request->input('user_id')) ?? new UserMasyarakat();

        // Simpan atau perbarui data profil pengguna
        $user->nama = $request->input('nama');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->nomor_telepon = $request->input('nomor_telepon');
        $user->no_rekening = $request->input('no_rekening');
        $user->alamat = $request->input('alamat');
        $user->foto_profil = $request->input('foto_profil');

        // Jika ada gambar profil yang diunggah, simpan ke storage
        if ($request->hasFile('foto_profil')) {
            // Hapus foto profil lama jika ada
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan foto baru
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->profile_picture = $path;
        }

        // Simpan data ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil disimpan.');
    }
}
