<?php

namespace Database\Seeders\seed;

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

        $admins = [
            [
                'nomor_ktp' => '1234567890123456',
                'nama' => 'Admin',
                'alamat' => 'Jl. Admin Utama No. 114G Sethiabudi',
                'email' => 'nihytpremium19@gmail.com',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1990-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567890',
                'no_rekening' => '1234567890',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123457',
                'nama' => 'Hafizh',
                'alamat' => 'Jl. Hafizh Utama No. 1',
                'email' => 'Hafizh.213040083@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1991-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567891',
                'no_rekening' => '1234567891',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123458',
                'nama' => 'Ahmad',
                'alamat' => 'Jl. Ahmad Utama No. 2',
                'email' => 'ahmad.213040085@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1992-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567892',
                'no_rekening' => '1234567892',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123459',
                'nama' => 'Dicky',
                'alamat' => 'Jl. Dicky Utama No. 3',
                'email' => 'dicky.213040107@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1993-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567893',
                'no_rekening' => '1234567893',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123460',
                'nama' => 'Yudha',
                'alamat' => 'Jl. Yudha Utama No. 4',
                'email' => 'yudha.213040077@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1994-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567894',
                'no_rekening' => '1234567894',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123461',
                'nama' => 'Dzikra',
                'alamat' => 'Jl. Dzikra Utama No. 5',
                'email' => 'dzikra.213040081@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1995-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567895',
                'no_rekening' => '1234567895',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
            [
                'nomor_ktp' => '1234567890123462',
                'nama' => 'Adiya',
                'alamat' => 'Jl. Adiya Utama No. 6',
                'email' => 'adiya.213040088@mail.unpas.ac.id',
                'kata_sandi' => Hash::make('password'),
                'tanggal_lahir' => '1996-01-01',
                'foto_profil' => null,
                'nomor_telepon' => '081234567896',
                'no_rekening' => '1234567896',
                'subtotal_poin' => 0,
                'nomor_terverifikasi' => true,
                'tanggal_email_diverifikasi' => now(),
                'tanggal_update' => now(),
                'tanggal_dihapus' => null,
                'tanggal_diverifikasi' => now(),
                'status_verifikasi' => 'Diterima',
            ],
        ];

        foreach ($admins as $admin) {
            Pengguna::create(array_merge(['id_peran' => 1], $admin));
        }
    }
}