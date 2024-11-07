<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriSampah; 
use App\Models\JenisSampah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
        {
            // data kategori sampah
            KategoriSampah::factory()->count(6)->create()->each(function ($kategori) { 
            // data jenis sampah untuk setiap kategori 
            JenisSampah::factory()->count(12)->create(['id_kategori_sampah' => $kategori->id]);
        });
    }
}