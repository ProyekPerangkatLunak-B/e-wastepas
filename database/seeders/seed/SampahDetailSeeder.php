<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SampahDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('sampah_detail')->insert([
            [
                'id_sampah_detail' => 1,
                'id_penjemputan' => 1,
                'id_kategori' => 1,
                'id_jenis' => 1,
                'berat' => 5.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sampah_detail' => 2,
                'id_penjemputan' => 1,
                'id_kategori' => 2,
                'id_jenis' => 2,
                'berat' => 7.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sampah_detail' => 3,
                'id_penjemputan' => 2,
                'id_kategori' => 3,
                'id_jenis' => 3,
                'berat' => 8.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}