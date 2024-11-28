<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Illuminate\Database\Seeder;
use Database\Seeders\seed\AdminSeeder;
use Database\Seeders\seed\JenisSeeder;
use Database\Seeders\seed\KategoriSeeder;
use Database\Seeders\seed\MasyarakatSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // data kategori sampah
        // KategoriSampah::factory()->count(6)->create()->each(function ($kategori) {
        //     // data jenis sampah untuk setiap kategori
        //     JenisSampah::factory()->count(12)->create(['id_kategori_sampah' => $kategori->id_kategori_sampah]);
        // });

        Daerah::factory()->count(10)->create()->each(function ($daerah) {
            Dropbox::factory()->count(15)->create(['id_daerah' => $daerah->id_daerah]);
        });

        $this->call([
            AdminSeeder::class,
            MasyarakatSeeder::class,
            KategoriSeeder::class,
            JenisSeeder::class,
        ]);
    }
}
