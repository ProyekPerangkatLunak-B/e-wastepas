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
                'nama_kategori' => 'Peralatan Pengubah Temperatur',
                'deskripsi_kategori' => 'Umumnya dikenal sebagai peralatan pendingin dan pembekuan. Contoh peralatan ini termasuk kulkas, freezer, AC, dan pompa panas.',
                // 'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Layar dan Monitor',
                'deskripsi_kategori' => 'Peralatan ini mencakup televisi, monitor, laptop, notebook, dan tablet.',
                // 'poin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Lampu',
                'deskripsi_kategori' => 'Termasuk lampu fluoresen, lampu pelepasan intensitas tinggi, dan lampu LED.',
                // 'poin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan Besar',
                'deskripsi_kategori' => 'Contoh peralatan ini meliputi mesin cuci, pengering pakaian, mesin pencuci piring, kompor listrik, mesin cetak besar, mesin fotokopi, dan panel fotovoltaik.',
                // 'poin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan Kecil',
                'deskripsi_kategori' => 'Contoh peralatan ini meliputi vacuum cleaner, microwave, alat ventilasi, pemanggang roti, ketel listrik, alat cukur elektrik, timbangan, radio, kamera video, mainan elektrik, alat medis kecil, dan instrumen pengendali.',
                // 'poin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan IT dan Telekomunikasi Kecil',
                'deskripsi_kategori' => 'Contohnya termasuk ponsel, perangkat GPS, kalkulator saku, router, komputer pribadi, printer, dan telepon.',
                // 'poin' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
