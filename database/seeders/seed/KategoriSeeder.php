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
                // 'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Sedang',
                'deskripsi_kategori' => 'Ini adalah kategori sampah elektronik sedang.',
                // 'poin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kecil',
                'deskripsi_kategori' => 'Ini adalah sampah elektronik kecil.',
                // 'poin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}