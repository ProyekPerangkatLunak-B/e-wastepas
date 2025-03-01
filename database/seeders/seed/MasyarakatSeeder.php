<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Peran;
use App\Models\DokumenKurir; // Import model DokumenKurir

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan peran "Masyarakat", "Kurir", dan "Manajemen" sudah ada di database
        $masyarakatRole = Peran::firstOrCreate(
            ['nama_peran' => 'Masyarakat'],
            ['deskripsi_peran' => 'User with limited access', 'status' => 1]
        );

        $kurirRole = Peran::firstOrCreate(
            ['nama_peran' => 'Kurir'],
            ['deskripsi_peran' => 'User with delivery access', 'status' => 1]
        );

        $manajemenRole = Peran::firstOrCreate(
            ['nama_peran' => 'Manajemen'],
            ['deskripsi_peran' => 'User with management access', 'status' => 1]
        );

        $emailRoles = [
            'admin' => 'dzikramf1@gmail.com',
            'masyarakat' => 'dzikramf2@gmail.com',
            'kurir' => 'dzikramf3@gmail.com',
            'manajemen' => 'dzikramf4@gmail.com',
        ];

        for ($i = 1; $i <= 80; $i++) {
            if ($i % 3 == 0) {
                $nomorKTP = str_pad('32' . str_pad($i, 14, '0', STR_PAD_LEFT), 16, '0', STR_PAD_LEFT);
            } elseif ($i % 2 == 0) {
                $nomorKTP = str_pad($i, 16, '0', STR_PAD_LEFT);
            } else {
                $nomorKTP = str_pad($i, 15, '0', STR_PAD_LEFT);
            }

            if ($i % 5 == 0) {
                $digit7 = rand(41, 71);
                $nomorKTP = substr($nomorKTP, 0, 6) . str_pad($digit7, 2, '0', STR_PAD_LEFT) . substr($nomorKTP, 8);
            } else {
                $digit7 = rand(0, 31);
                $nomorKTP = substr($nomorKTP, 0, 6) . str_pad($digit7, 2, '0', STR_PAD_LEFT) . substr($nomorKTP, 8);
            }

            if ($i % 3 == 0) {
                $nomorTelepon = '1234' . str_pad($i, 8, '0', STR_PAD_LEFT);
            } elseif ($i % 2 == 0) {
                $nomorTelepon = '08' . str_pad($i, 9, '0', STR_PAD_LEFT);
            } else {
                $nomorTelepon = '08' . str_pad($i, 7, '0', STR_PAD_LEFT);
            }

            $isKurir = $i % 4 == 0;
            $isManajemen = $i % 10 == 0; // Setiap pengguna ke-10 menjadi manajemen

            if ($isManajemen) {
                $email = $emailRoles['manajemen'];
                $nama = "Manajemen User $i";
                $roleId = $manajemenRole->id_peran;
            } elseif ($isKurir) {
                $email = $emailRoles['kurir'];
                $nama = "Kurir User $i";
                $roleId = $kurirRole->id_peran;
            } else {
                $email = $emailRoles['masyarakat'];
                $nama = "Masyarakat User $i";
                $roleId = $masyarakatRole->id_peran;
            }

            // $pengguna = Pengguna::create([
            //     'id_peran' => $roleId,
            //     'nomor_ktp' => $nomorKTP,
            //     'nama' => $nama,
            //     'alamat' => "Jl. Masyarakat Sejahtera No. $i",
            //     'email' => $i . $email,
            //     'kata_sandi' => Hash::make('password123'),
            //     'tanggal_lahir' => now()->subYears(rand(18, 40))->format('Y-m-d'),
            //     'foto_profil' => 'https://picsum.photos/id/' . rand(0, 800) . '/200/300',
            //     'nomor_telepon' => $nomorTelepon,
            //     'no_rekening' => str_pad($i, 10, '0', STR_PAD_LEFT),
            //     'subtotal_poin' => rand(0, 100),
            //     'nomor_terverifikasi' => true,
            //     'tanggal_email_diverifikasi' => now(),
            //     'tanggal_update' => now(),
            //     'tanggal_dihapus' => null,
            //     'tanggal_diverifikasi' => now(),
            //     'status_verifikasi' => $i <= 75 ? 'Diproses' : 'Diterima',
            // ]);

            // // Jika pengguna adalah kurir, buat entri dokumen kurir
            // if ($isKurir) {
            //     DokumenKurir::create([
            //         'id_pengguna' => $pengguna->id_pengguna,
            //         'tipe_dokumen' => $i % 2 == 0 ? 'KTP' : 'KK', // Selang-seling KTP dan KK
            //         'file_dokumen' => "https://picsum.photos/720/720?random=$i", // URL dari Picsum dengan parameter random
            //         'catatan_admin' => $i % 5 == 0 ? "Dokumen user $i perlu verifikasi manual." : null,
            //     ]);
            // }
        }
    }
}
