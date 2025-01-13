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
            ['nama_jenis' => 'Lemari es', 'id_kategori' => 1, 'poin' => 100, 'gambar' => 'Lemari es.png'],
            ['nama_jenis' => 'Freezer', 'id_kategori' => 1, 'poin' => 100, 'gambar' => 'Freezer.png'],
            ['nama_jenis' => 'Pendingin udara', 'id_kategori' => 1, 'poin' => 100, 'gambar' => 'Pendingin udara.png'],
            ['nama_jenis' => 'Pompa panas', 'id_kategori' => 1, 'poin' => 100, 'gambar' => 'Pompa panas.png'],

            // Layar dan Monitor
            ['nama_jenis' => 'Televisi', 'id_kategori' => 2, 'poin' => 200, 'gambar' => 'Televisi.png'],
            ['nama_jenis' => 'Monitor', 'id_kategori' => 2, 'poin' => 200, 'gambar' => 'Monitor.png'],
            ['nama_jenis' => 'Laptop', 'id_kategori' => 2, 'poin' => 200, 'gambar' => 'Laptop.png'],
            ['nama_jenis' => 'Notebook', 'id_kategori' => 2, 'poin' => 200, 'gambar' => 'Notebook.png'],
            ['nama_jenis' => 'Tablet', 'id_kategori' => 2, 'poin' => 200, 'gambar' => 'Tablet.png'],

            // Lampu
            ['nama_jenis' => 'Lampu fluoresen', 'id_kategori' => 3, 'poin' => 300, 'gambar' => 'Lampu fluoresen.png'],
            ['nama_jenis' => 'Lampu pelepasan intensitas tinggi', 'id_kategori' => 3, 'poin' => 300, 'gambar' => 'Lampu pelepasan intensitas tinggi.png'],
            ['nama_jenis' => 'Lampu LED', 'id_kategori' => 3, 'poin' => 300, 'gambar' => 'Lampu LED.png'],

            // Peralatan Besar
            ['nama_jenis' => 'Mesin cuci', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Mesin cuci.png'],
            ['nama_jenis' => 'Pengering pakaian', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Pengering pakaian.png'],
            ['nama_jenis' => 'Mesin pencuci piring', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Mesin pencuci piring.png'],
            ['nama_jenis' => 'Kompor listrik', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Kompor listrik.png'],
            ['nama_jenis' => 'Mesin cetak besar', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Mesin cetak besar.png'],
            ['nama_jenis' => 'Mesin fotokopi', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Mesin fotokopi.png'],
            ['nama_jenis' => 'Panel fotovoltaik', 'id_kategori' => 4, 'poin' => 400, 'gambar' => 'Panel fotovoltaik.png'],

            // Peralatan Kecil
            ['nama_jenis' => 'Vacuum cleaner', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Vacuum cleaner.png'],
            ['nama_jenis' => 'Microwave', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Microwave.png'],
            ['nama_jenis' => 'Alat ventilasi', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Alat ventilasi.png'],
            ['nama_jenis' => 'Pemanggang roti', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Pemanggang roti.png'],
            ['nama_jenis' => 'Ketel listrik', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Ketel listrik.png'],
            ['nama_jenis' => 'Pencukur listrik', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Pencukur listrik.png'],
            ['nama_jenis' => 'Timbangan', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Timbangan.png'],
            ['nama_jenis' => 'Kalkulator', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Kalkulator.png'],
            ['nama_jenis' => 'Perangkat radio', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Perangkat radio.png'],
            ['nama_jenis' => 'Kamera video', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Kamera video.png'],
            ['nama_jenis' => 'Mainan elektronik kecil', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Mainan elektronik kecil.png'],
            ['nama_jenis' => 'Alat listrik kecil', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Alat listrik kecil.png'],
            ['nama_jenis' => 'Alat medis kecil', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Alat medis kecil.png'],
            ['nama_jenis' => 'Perangkat pengawasan', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Perangkat pengawasan.png'],
            ['nama_jenis' => 'Instrumen kontrol', 'id_kategori' => 5, 'poin' => 500, 'gambar' => 'Instrumen kontrol.png'],

            // Peralatan IT dan Telekomunikasi Kecil
            ['nama_jenis' => 'Ponsel', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Ponsel.png'],
            ['nama_jenis' => 'Perangkat GPS', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Perangkat GPS.png'],
            ['nama_jenis' => 'Kalkulator saku', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Kalkulator saku.png'],
            ['nama_jenis' => 'Router', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Router.png'],
            ['nama_jenis' => 'Komputer pribadi', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Komputer pribadi.png'],
            ['nama_jenis' => 'Printer', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Printer.png'],
            ['nama_jenis' => 'Telepon', 'id_kategori' => 6, 'poin' => 600, 'gambar' => 'Telepon.png'],
        ]);
    }
}
