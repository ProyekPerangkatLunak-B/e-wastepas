<?php

namespace Database\Seeders\penjemputan;

use Illuminate\Database\Seeder;
use Database\Seeders\seed\JenisSeeder;
use Database\Seeders\seed\DaerahSeeder;
use Database\Seeders\seed\KategoriSeeder;
use Database\Seeders\seed\PelacakanSeeder;
use Database\Seeders\seed\PenjemputanSeeder;
use Database\Seeders\seed\DetailPenjemputanSeeder;
use Database\Seeders\penjemputan\UserSeeder;
use Database\Seeders\seed\DropboxSeeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DaerahSeeder::class,
            DropboxSeeder::class,
            KategoriSeeder::class,
            JenisSeeder::class,
            UserSeeder::class,
            PenjemputanSeeder::class,
            DetailPenjemputanSeeder::class,
            PelacakanSeeder::class,
        ]);
    }
}