<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SampahDetailAndPenjemputanSeeder extends Seeder
{
    public function run()
    {
        $daerahs = DB::table('daerah')->pluck('id_daerah');
        $dropboxes = DB::table('dropbox')->pluck('id_dropbox');
        $kategori = DB::table('kategori')->pluck('id_kategori');
        $jenis = DB::table('jenis')->pluck('id_jenis');
        $masyarakats = DB::table('pengguna')->where('id_peran', 2)->pluck('id_pengguna');
        $kurirs = DB::table('pengguna')->where('id_peran', 3)->pluck('id_pengguna');

        foreach ($masyarakats as $idMasyarakat) {
            $idKurir = $kurirs->random();

            for ($i = 1; $i <= 5; $i++) {
                $totalBerat = 0;
                $totalPoin = 0;

                $idDaerah = $daerahs->random();
                $idDropbox = $dropboxes->random();

                // Masukkan data penjemputan
                $penjemputanId = DB::table('penjemputan')->insertGetId([
                    'id_daerah' => $idDaerah,
                    'id_dropbox' => $idDropbox,
                    'id_pengguna_masyarakat' => $idMasyarakat,
                    'id_pengguna_kurir' => $idKurir,
                    'tanggal_penjemputan' => now(),
                    'alamat_penjemputan' => 'Alamat Masyarakat ' . $idMasyarakat,
                    'catatan' => 'Catatan untuk penjemputan ' . $i . ' oleh masyarakat ' . $idMasyarakat,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                for ($j = 1; $j <= 5; $j++) {
                    $berat = rand(1, 10) + rand(0, 99) / 100;
                    $idKategori = $kategori->random();
                    $idJenis = $jenis->random();
                    $poin = $berat * rand(5, 10);

                    DB::table('detail_penjemputan')->insert([
                        'id_penjemputan' => $penjemputanId,
                        'id_kategori' => $idKategori,
                        'id_jenis' => $idJenis,
                        'berat' => $berat,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $totalBerat += $berat;
                    $totalPoin += $poin;
                }

                DB::table('penjemputan')->where('id_penjemputan', $penjemputanId)->update([
                    'total_berat' => $totalBerat,
                    'total_poin' => $totalPoin,
                ]);
            }
        }
    }
}
