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
            ],
            [
                'nama_kategori' => 'Layar dan Monitor',
                'deskripsi_kategori' => 'Peralatan umum seperti televisi, monitor, laptop, notebook, dan tablet.',
            ],
            [
                'nama_kategori' => 'Lampu',
                'deskripsi_kategori' => 'Lampu fluoresen, lampu dengan intensitas tinggi, dan lampu LED.',
            ],
            [
                'nama_kategori' => 'Peralatan Besar',
                'deskripsi_kategori' => 'Seperti mesin cuci, pengering pakaian, mesin pencuci piring, kompor listrik, mesin cetak besar, mesin fotokopi, dan panel fotovoltaik.',
            ],
            [
                'nama_kategori' => 'Peralatan Kecil',
                'deskripsi_kategori' => 'Seperti penyedot debu, microwave, peralatan ventilasi, pemanggang roti, ketel listrik, alat cukur elektrik, timbangan, kalkulator, dan alat kontrol.',
            ],
            [
                'nama_kategori' => 'Peralatan IT dan Telekomunikasi Kecil',
                'deskripsi_kategori' => 'Seperti ponsel, perangkat GPS, kalkulator saku, router, komputer pribadi, printer, dan telepon.',
            ],
        ];

        // Insert kategori data
        foreach ($kategoriData as $kategori) {
            DB::table('kategori')->insert($kategori);
        }

        // Data jenis (kita asumsikan setiap kategori memiliki beberapa jenis terkait)
        $jenisData = [
            ['id_kategori' => 1, 'nama_jenis' => 'Kulkas', 'poin' => 100],
            ['id_kategori' => 1, 'nama_jenis' => 'Freezer', 'poin' => 150],
            ['id_kategori' => 1, 'nama_jenis' => 'AC', 'poin' => 120],
            ['id_kategori' => 2, 'nama_jenis' => 'Televisi', 'poin' => 80],
            ['id_kategori' => 2, 'nama_jenis' => 'Monitor', 'poin' => 70],
            ['id_kategori' => 2, 'nama_jenis' => 'Laptop', 'poin' => 200],
            ['id_kategori' => 3, 'nama_jenis' => 'Lampu Fluoresen', 'poin' => 10],
            ['id_kategori' => 3, 'nama_jenis' => 'Lampu LED', 'poin' => 20],
            ['id_kategori' => 4, 'nama_jenis' => 'Mesin Cuci', 'poin' => 150],
            ['id_kategori' => 4, 'nama_jenis' => 'Pengering Pakaian', 'poin' => 160],
            ['id_kategori' => 5, 'nama_jenis' => 'Microwave', 'poin' => 50],
            ['id_kategori' => 5, 'nama_jenis' => 'Vacuum Cleaner', 'poin' => 40],
            ['id_kategori' => 6, 'nama_jenis' => 'Ponsel', 'poin' => 200],
            ['id_kategori' => 6, 'nama_jenis' => 'Router', 'poin' => 60],
        ];

        // Insert jenis data
        foreach ($jenisData as $jenis) {
            DB::table('jenis')->insert($jenis);
        }
    }
}
