<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenjemputanSeeder extends Seeder
{
    public function run()
    {
        $penjemputanIds = DB::table('penjemputan')->pluck('id_penjemputan')->toArray();
        $jenisData = DB::table('jenis')->get();
        $kategoriIds = DB::table('kategori')->pluck('id_kategori')->toArray();

        $detailData = [];
        foreach ($penjemputanIds as $idPenjemputan) {
            $jumlahDetails = rand(1, 5); // Setiap penjemputan memiliki 1-5 detail

            for ($i = 1; $i <= $jumlahDetails; $i++) {
                $jenis = $jenisData->random();
                $idKategori = $kategoriIds[array_rand($kategoriIds)];
                $berat = rand(10, 100) / 10; // Berat dalam kilogram

                $detailData[] = [
                    'id_penjemputan' => $idPenjemputan,
                    'id_jenis' => $jenis->id_jenis,
                    'id_kategori' => $idKategori,
                    'berat' => $berat,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data ke tabel detail_penjemputan
        DB::table('detail_penjemputan')->insert($detailData);

        $penjemputanDetails = DB::raw('SELECT dp.id_penjemputan, SUM(j.berat) as total_berat, SUM(j.poin) + SUM(k.poin) as total_poin
            FROM detail_penjemputan AS dp
            JOIN jenis AS j ON dp.id_jenis = j.id_jenis
            JOIN kategori AS k ON dp.id_kategori = k.id_kategori
            GROUP BY id_penjemputan');

        foreach ($penjemputanDetails as $detail) {
            DB::table('penjemputan')
                ->where('id_penjemputan', $detail->id_penjemputan)
                ->update([
                    'total_berat' => $detail->total_berat,
                    'total_poin' => $detail->total_poin,
                    'updated_at' => now(),
                ]);
        }
    }
}
