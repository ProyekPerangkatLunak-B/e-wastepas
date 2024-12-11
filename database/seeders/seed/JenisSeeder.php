<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis')->insert([
            // Peralatan Penukar Suhu
            ['nama_jenis' => 'Lemari es', 'id_kategori' => 1, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Freezer', 'id_kategori' => 1, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Pendingin udara', 'id_kategori' => 1, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Pompa panas', 'id_kategori' => 1, 'poin' => null, 'gambar' => 'no-image.png'],

            // Layar dan Monitor
            ['nama_jenis' => 'Televisi', 'id_kategori' => 2, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Monitor', 'id_kategori' => 2, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Laptop', 'id_kategori' => 2, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Notebook', 'id_kategori' => 2, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Tablet', 'id_kategori' => 2, 'poin' => null, 'gambar' => 'no-image.png'],

            // Lampu
            ['nama_jenis' => 'Lampu fluoresen', 'id_kategori' => 3, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Lampu pelepasan intensitas tinggi', 'id_kategori' => 3, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Lampu LED', 'id_kategori' => 3, 'poin' => null, 'gambar' => 'no-image.png'],

            // Peralatan Besar
            ['nama_jenis' => 'Mesin cuci', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Pengering pakaian', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Mesin pencuci piring', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Kompor listrik', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Mesin cetak besar', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Mesin fotokopi', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Panel fotovoltaik', 'id_kategori' => 4, 'poin' => null, 'gambar' => 'no-image.png'],

            // Peralatan Kecil
            ['nama_jenis' => 'Vacuum cleaner', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Microwave', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Alat ventilasi', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Pemanggang roti', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Ketel listrik', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Pencukur listrik', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Timbangan', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Kalkulator', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Perangkat radio', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Kamera video', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Mainan elektronik kecil', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Alat listrik kecil', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Alat medis kecil', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Perangkat pengawasan', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Instrumen kontrol', 'id_kategori' => 5, 'poin' => null, 'gambar' => 'no-image.png'],

            // Peralatan IT dan Telekomunikasi Kecil
            ['nama_jenis' => 'Ponsel', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Perangkat GPS', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Kalkulator saku', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Router', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Komputer pribadi', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Printer', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
            ['nama_jenis' => 'Telepon', 'id_kategori' => 6, 'poin' => null, 'gambar' => 'no-image.png'],
        ]);
    }
}
