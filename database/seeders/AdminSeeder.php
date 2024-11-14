<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Peran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peran::create([
            'nama_peran' => 'Admin',
            'deskripsi_peran' => 'Administrator with full access',
            'status' => 1,
        ]);

        Pengguna::create([
            'id_peran' => 1, // Sesuaikan dengan id peran admin
            'nomor_ktp' => '1234567890123456',
            'nama' => 'Admin',
            'alamat' => 'Jl. Admin Utama No. 114G Sethiabudi',
            'email' => 'yayansupirna20@gmail.com',
            'kata_sandi' => Hash::make('password'), // Gantilah dengan password yang aman
            'tanggal_lahir' => '1990-01-01',
            'foto_profil' => null,
            'nomor_telepon' => '081234567890',
            'no_rekening' => '1234567890',
            'subtotal_poin' => 0,
            'status' => 'Diterima',
            'nomor_terverifikasi' => true,
            'tanggal_email_diverifikasi' => now(),
            'tanggal_update' => now(),
            'tanggal_dihapus' => null,
            'tanggal_diverifikasi' => now(),
            'status_verifikasi' => 'Diterima',
        ]);
    }
}
