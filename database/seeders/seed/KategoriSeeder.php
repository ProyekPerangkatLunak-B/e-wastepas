<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Besar',
                'deskripsi_kategori' => 'Ini adalah kategori sampah elektronik besar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Sedang',
                'deskripsi_kategori' => 'Ini adalah kategori sampah elektronik sedang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kecil',
                'deskripsi_kategori' => 'Ini adalah sampah elektronik kecil.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
