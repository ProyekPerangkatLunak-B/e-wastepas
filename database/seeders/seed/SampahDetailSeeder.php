<?php

namespace Database\Seeders\seed;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Penjemputan;
use App\Models\SampahDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SampahDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penjemputans = Penjemputan::all();
        $kategoris = Kategori::all();
        $jenisList = Jenis::all();

        if ($penjemputans->isEmpty() || $kategoris->isEmpty() || $jenisList->isEmpty()) {
            $this->command->error('Pastikan tabel "penjemputan", "kategori", dan "jenis" memiliki data.');
            return;
        }

        foreach ($penjemputans as $penjemputan) {
            $totalBerat = 0;
            $totalPoin = 0;

            foreach (range(1, rand(2, 5)) as $index) {
                $kategori = $kategoris->random();
                $jenis = $jenisList->where('id_kategori', $kategori->id_kategori)->random();

                $berat = rand(1, 10) + (rand(0, 99) / 100);
                $poin = $jenis->poin * $berat;

                SampahDetail::create([
                    'id_penjemputan' => $penjemputan->id_penjemputan,
                    'id_kategori' => $kategori->id_kategori,
                    'id_jenis' => $jenis->id_jenis,
                    'berat' => $berat,
                ]);

                $totalBerat += $berat;
                $totalPoin += $poin;
            }

            $penjemputan->update([
                'total_berat' => $totalBerat,
                'total_poin' => $totalPoin,
            ]);
        }
    }
}
