<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjemputanSampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjemputan = [];
        
        // Daftar pengguna masyarakat dan kurir yang sudah ada
        $usersMasyarakat = [1, 2, 3]; // Contoh ID pengguna masyarakat
        $usersKurir = [1, 2, 3]; // Contoh ID pengguna kurir

        // Daftar daerah yang sudah ada
        $daerahs = [1, 2, 3, 4, 5]; // ID daerah yang ada pada tabel 'daerah'

        // Daftar dropbox yang sudah ada
        $dropboxes = [1, 2, 3]; // ID dropbox yang ada pada tabel 'dropbox'

        // Generate data penjemputan
        foreach ($daerahs as $id_daerah) {
            foreach ($dropboxes as $id_dropbox) {
                foreach ($usersMasyarakat as $id_pengguna_masyarakat) {
                    foreach ($usersKurir as $id_pengguna_kurir) {
                        $penjemputan[] = [
                            'id_daerah' => $id_daerah,
                            'id_dropbox' => $id_dropbox,
                            'id_pengguna_masyarakat' => $id_pengguna_masyarakat,
                            'id_pengguna_kurir' => $id_pengguna_kurir,
                            'total_berat' => rand(10, 20), // Berat total sampah (contoh)
                            'total_poin' => rand(100, 200), // Poin total (contoh)
                            'tanggal_penjemputan' => now(),
                            'alamat_penjemputan' => "Alamat untuk Daerah $id_daerah, Dropbox $id_dropbox",
                            'catatan' => 'Penjemputan dilakukan sesuai jadwal.',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }

        // Insert data
        DB::table('penjemputan')->insert($penjemputan);
    }
}
