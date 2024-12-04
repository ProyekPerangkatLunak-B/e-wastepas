<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMasyarakat; // Jika ini adalah model yang sesuai

class ProfileMasyarakatController extends Controller
{
    // Menampilkan profil pengguna
    public function showProfile()
    {
        return view('masyarakat.profile.show', [
            'user' => Auth::user() // Menampilkan data pengguna yang sedang login
        ]);
    }

    // Memperbarui data profil pengguna
    public function update(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'no_rekening' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:15360', // Maksimal 15 MB
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        
        // Update data pengguna
        $user->nama = $request->input('nama');
        $user->nomor_telepon = $request->input('no_telepon');
        $user->alamat = $request->input('alamat');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->no_rekening = $request->input('no_rekening');

        // Jika ada file gambar profile yang diupload
        if ($request->hasFile('profile_picture')) {
            // Simpan gambar profile di storage/public
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath; // Simpan path gambar ke kolom profile_picture
        }

        // Simpan perubahan data pengguna
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
