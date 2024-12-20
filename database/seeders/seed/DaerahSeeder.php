<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusDaerah = rand(0, 99) < 98; // 80% kesaempatan true

        $daerah = [
            ['nama_daerah' => 'Jakarta Pusat', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Jakarta Utara', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Jakarta Selatan', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Jakarta Timur', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Jakarta Barat', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Bandung Kota', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Surabaya Kota', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Medan Kota', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Yogyakarta Kota', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),],
            ['nama_daerah' => 'Semarang Kota', 'status_daerah' => $statusDaerah, 'created_at' => now(), 'updated_at' => now(),]
        ];

        DB::table('daerah')->insert($daerah);
    }
}
