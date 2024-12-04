<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Kategori 1 - Sampah Elektronik
            ['id_kategori' => 1, 'nama_jenis' => 'Kulkas', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'AC', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'TV', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],

            // Kategori 2 - Komputer dan Perangkat Pendukung
            ['id_kategori' => 2, 'nama_jenis' => 'PC', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Monitor', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Printer', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Scanner', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'UPS', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Inverter', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Stabilizer', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],

            // Kategori 3 - Perangkat Kecil
            ['id_kategori' => 3, 'nama_jenis' => 'Mouse', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Keyboard', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Charger', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Earphone', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Speaker', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Headphone', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Smartwatch', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Smartband', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('jenis')->insert($data);
    }
}
