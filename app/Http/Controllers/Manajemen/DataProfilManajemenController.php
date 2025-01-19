<?php

namespace App\Http\Controllers\Manajemen;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DataProfilManajemenController extends Controller
{
    public function updateProfile(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_pengguna' => 'required',
            'name' => 'required|string|min:3|max:50',
            'nomor_telepon' => 'required|regex:/^08[0-9]{9,11}$/',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|min:5|max:255',
            'foto_profil' => 'nullable|file|mimes:jpg,jpeg,png|max:15360', // 15 MB
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.max' => 'Nama maksimal 50 karakter.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nomor_telepon.regex' => 'Nomor telepon harus dimulai dengan 08 dan memiliki 10-13 digit.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'foto_profil.file' => 'Foto profil harus berupa file.',
            'foto_profil.mimes' => 'Foto profil harus berupa file dengan format JPG, JPEG, atau PNG.',
            'foto_profil.max' => 'Foto profil tidak boleh lebih dari 15 MB.',
        ]);

        // dd($request->id_pengguna);

        // Cari pengguna berdasarkan ID (misalnya pengguna saat ini)
        $user = User::find($request->id_pengguna); // atau User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Pengguna tidak ditemukan.',
            ], 404);
        }

        // Proses unggah dan simpan file foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            $uploadedFile = $request->file('foto_profil');

            // Hash nama file berdasarkan konten
            $hashName = hash_file('sha256', $uploadedFile->getRealPath()) . '.' . $uploadedFile->getClientOriginalExtension();

            // Simpan file ke direktori yang ditentukan
            // $uploadedFile->storeAs('img/manajemen/registrasi/profile', $hashName, 'public_uploads');
            $uploadedFile->storeAs('', $hashName, 'public');

            // Hapus file foto lama jika ada
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan nama file baru ke database
            $user->foto_profil = $hashName;
        }

        // Perbarui data pengguna
        $user->nama = $validatedData['name'];
        $user->nomor_telepon = $validatedData['nomor_telepon'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->alamat = $validatedData['alamat'];
        $user->tanggal_update = now();
        $user->save();

        return redirect()->back()->with(
            'success',
            'Data berhasil di perbaharui.',
        );

        // // Debugging
        // return response()->json([
        //     'message' => 'Data berhasil diperbarui.',
        //     'data' => [
        //         'id_pengguna' => $user->id_pengguna,
        //         'nama' => $user->nama,
        //         'nomor_telepon' => $user->nomor_telepon,
        //         'tanggal_lahir' => $user->tanggal_lahir,
        //         'alamat' => $user->alamat,
        //         'foto_profil' => $user->foto_profil ? asset('storage/' . $user->foto_profil) : null,
        //     ],
        // ]);
    }

    public function ubahPassword(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'old-password' => 'required|string|min:6',
            'password' => 'required|string|min:6|different:old-password',
            'confirm-password' => 'required|same:password',
        ], [
            'old-password.required' => 'Password lama wajib diisi.',
            'old-password.string' => 'Password lama harus berupa teks.',
            'old-password.min' => 'Password lama minimal 6 karakter.',
            'password.required' => 'Password baru wajib diisi.',
            'password.string' => 'Password baru harus berupa teks.',
            'password.min' => 'Password baru minimal 6 karakter.',
            'password.different' => 'Password baru harus berbeda dari password lama.',
            'confirm-password.required' => 'Konfirmasi password wajib diisi.',
            'confirm-password.same' => 'Konfirmasi password tidak sesuai dengan password baru.',
        ]);

        // Ambil pengguna berdasarkan ID
        $user = User::findOrFail($request->id_pengguna);

        // Periksa apakah password lama cocok
        if (!Hash::check($request->input('old-password'), $user->kata_sandi)) {
            return back()->withErrors(['old-password' => 'Password lama tidak sesuai.'])->withInput();
        }

        // Update password baru
        $user->update([
            'kata_sandi' => Hash::make($request->input('password')),
        ]);

        // Kembalikan response success
        return redirect()->route('manajemen.password.konfirmasi-ubah-password')->with('success', 'Password berhasil diperbarui.');
    }
}
