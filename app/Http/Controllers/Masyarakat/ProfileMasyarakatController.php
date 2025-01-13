<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserMasyarakat;
use Illuminate\Support\Facades\Auth;

class ProfileMasyarakatController extends Controller
{
    /**
     * Menampilkan halaman profil.
     */
    public function showProfile()
    {
        $user = Pengguna::findOrFail(Auth::user()->id_pengguna);
        return view('masyarakat.registrasi.profile.show', compact('user'));
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

        $user = Auth::user();
        // Cari pengguna berdasarkan ID
        $user = UserMasyarakat::findOrFail($user->id_pengguna);

        // Perbarui data profil pengguna
        $user->nama = $request->input('nama');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->nomor_telepon = $request->input('nomor_telepon');
        $user->no_rekening = $request->input('no_rekening');
        $user->alamat = $request->input('alamat');

        // Perbarui foto profil jika ada file yang diunggah
        if ($request->hasFile('foto_profil')) {
            // Hapus foto profil lama jika ada
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan foto baru
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $path;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}