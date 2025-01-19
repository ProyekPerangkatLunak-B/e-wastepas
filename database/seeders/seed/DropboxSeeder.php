<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DropboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dropboxes = [];

        // Daftar kecamatan berdasarkan daerah
        $data = [
            1 => ['Gambir', 'Menteng', 'Tanah Abang', 'Sawah Besar', 'Kemayoran', 'Cempaka Putih', 'Johar Baru', 'Senen', 'Pulogadung', 'Matraman'],
            2 => ['Koja', 'Kelapa Gading', 'Cilincing', 'Pademangan', 'Tanjung Priok', 'Penjaringan', 'Sunter', 'Pluit', 'Muara Angke', 'Kapuk Muara'],
            3 => ['Kebayoran Baru', 'Kebayoran Lama', 'Pondok Indah', 'Bintaro', 'Cipulir', 'Pesanggrahan', 'Ciputat', 'Cilandak', 'Jagakarsa', 'Pancoran'],
            4 => ['Matraman', 'Duren Sawit', 'Cakung', 'Pulo Gadung', 'Jatinegara', 'Pasar Rebo', 'Ciracas', 'Kramat Jati', 'Makasar', 'Cipayung'],
            5 => ['Cengkareng', 'Grogol', 'Kalideres', 'Taman Sari', 'Kembangan', 'Tambora', 'Palmerah', 'Slipi', 'Kedoya', 'Meruya'],
            6 => ['Cicendo', 'Lengkong', 'Astana Anyar', 'Regol', 'Bandung Wetan', 'Cibeunying Kaler', 'Cibeunying Kidul', 'Coblong', 'Antapani', 'Buah Batu'],
            7 => ['Tegalsari', 'Genteng', 'Gubeng', 'Wonokromo', 'Tambaksari', 'Semampir', 'Lakarsantri', 'Mulyorejo', 'Dukuh Pakis', 'Wiyung'],
            8 => ['Medan Kota', 'Medan Baru', 'Medan Timur', 'Medan Barat', 'Medan Selayang', 'Medan Perjuangan', 'Medan Helvetia', 'Medan Deli', 'Medan Johor', 'Medan Marelan'],
            9 => ['Kraton', 'Gondomanan', 'Wirobrajan', 'Mantrijeron', 'Kotagede', 'Pakualaman', 'Danurejan', 'Umbulharjo', 'Gedongtengen', 'Tegalrejo'],
            10 => ['Tembalang', 'Banyumanik', 'Candisari', 'Gunungpati', 'Mijen', 'Tugu', 'Semarang Utara', 'Semarang Selatan', 'Semarang Barat', 'Semarang Tengah'],
        ];

        // Generate data
        foreach ($data as $id_daerah => $kecamatans) {
            foreach ($kecamatans as $index => $nama_kecamatan) {
                $dropboxes[] = [
                    'id_daerah' => $id_daerah,
                    'nama_dropbox' => "Dropbox $nama_kecamatan",
                    'alamat_dropbox' => "Jl. $nama_kecamatan No." . ($index + 1),
                    'status_dropbox' => rand(0, 99) < 60,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data
        DB::table('dropbox')->insert($dropboxes);
    }
}
