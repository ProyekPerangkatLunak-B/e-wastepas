<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data kategori
        $kategoriData = [
            [
                'nama_kategori' => 'Peralatan Penukar Suhu',
                'deskripsi_kategori' => 'Peralatan yang sering disebut sebagai peralatan pendingin dan pembekuan, seperti kulkas, freezer, AC, dan pompa panas.',
                'poin' => 10,
                'gambar' => 'Peralatan Penukar Suhu.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Layar dan Monitor',
                'deskripsi_kategori' => 'Peralatan umum seperti televisi, monitor, laptop, notebook, dan tablet.',
                'poin' => 20,
                'gambar' => 'Layar dan Monitor.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Lampu',
                'deskripsi_kategori' => 'Lampu fluoresen, lampu dengan intensitas tinggi, dan lampu LED.',
                'poin' => 30,
                'gambar' => 'Lampu.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan Besar',
                'deskripsi_kategori' => 'Seperti mesin cuci, pengering pakaian, mesin pencuci piring, kompor listrik, mesin cetak besar, mesin fotokopi, dan panel fotovoltaik.',
                'poin' => 40,
                'gambar' => 'Peralatan Besar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan Kecil',
                'deskripsi_kategori' => 'Seperti penyedot debu, microwave, peralatan ventilasi, pemanggang roti, ketel listrik, alat cukur elektrik, timbangan, kalkulator, dan alat kontrol.',
                'poin' => 50,
                'gambar' => 'Peralatan Kecil.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan IT dan Telekomunikasi Kecil',
                'deskripsi_kategori' => 'Seperti ponsel, perangkat GPS, kalkulator saku, router, komputer pribadi, printer, dan telepon.',
                'poin' => 60,
                'gambar' => 'Peralatan IT dan Telekomunikasi Kecil.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert kategori data
        foreach ($kategoriData as $kategori) {
            DB::table('kategori')->insert($kategori);
        }
    }
}
