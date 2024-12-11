<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\JenisSampah;
use App\Models\KategoriSampah;
use Illuminate\Database\Seeder;
use Database\Seeders\seed\AdminSeeder;
use Database\Seeders\seed\DaerahSeeder;
use Database\Seeders\seed\DetailPenjemputanSeeder;
use Database\Seeders\seed\DropboxSeeder;
use Database\Seeders\seed\JenisSeeder;
use Database\Seeders\seed\KategoriSeeder;
use Database\Seeders\seed\MasyarakatSeeder;
use Database\Seeders\seed\PelacakanSeeder;
use Database\Seeders\seed\PenjemputanSeeder;
use Database\Seeders\seed\SampahDetailAndPenjemputanSeeder;
use Database\Seeders\seed\SampahDetailSeeder;

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

        // Data daerah dan dropbox dengan factory
        // Daerah::factory()->count(10)->create()->each(function ($daerah) {
        //     Dropbox::factory()->count(15)->create(['id_daerah' => $daerah->id_daerah]);
        // });
        //  ~~ * ~~

        $this->call([
            AdminSeeder::class,
            MasyarakatSeeder::class,
            KategoriSeeder::class,
            JenisSeeder::class,
            // Data daerah dan dropbox tanpa factory
            DaerahSeeder::class,
            DropboxSeeder::class,
            //  ~~ * ~~
            PenjemputanSeeder::class,
            // DetailPenjemputanSeeder::class, benerin lagi
            PelacakanSeeder::class,
        ]);
    }
}
