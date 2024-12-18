<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenjemputanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $dat = 20; // jumlah data eksekusi

        $penggunaMasyarakatIds = DB::table('pengguna')
            ->where('id_peran', 2) // Peran masyarakat
            ->pluck('id_pengguna')
            ->toArray();

        $penggunaKurirIds = DB::table('pengguna')
            ->where('id_peran', 3) // Peran kurir
            ->pluck('id_pengguna')
            ->toArray();

        $daerahIds = DB::table('daerah')->pluck('id_daerah')->toArray();
        $dropboxIds = DB::table('dropbox')->pluck('id_dropbox')->toArray();

        $data = [];
        for ($i = 1; $i <= $dat; $i++) {

            // Ambil data daerah dan pengguna masyarakat secara acak
            $daerah = DB::table('daerah')
                ->where('id_daerah', $daerahIds[array_rand($daerahIds)])
                ->first();
            $penggunaMasyarakat = DB::table('pengguna')
                ->where('id_pengguna', $penggunaMasyarakatIds[array_rand($penggunaMasyarakatIds)])->first();

            // Buat kode penjemputan
            $kodeAkhir = $data ? (object) end($data) : null;
            $hariIni = now()->format('ym');
            if (!$kodeAkhir || substr($kodeAkhir->kode_penjemputan, 1, 3) !== str_pad($daerah->id_daerah, 3, '0', STR_PAD_LEFT) || substr($kodeAkhir->kode_penjemputan, -7, 4) !== $hariIni) {
                $kodePenjemputan = 'D' . str_pad($daerah->id_daerah, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . '001';
            } else {
                $kodePenjemputan = 'D' . str_pad($daerah->id_daerah, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . str_pad((int)substr($kodeAkhir->kode_penjemputan, -3) + 1, 3, '0', STR_PAD_LEFT);
            }

            // Tambahkan data penjemputan
            $data[] = [
                'kode_penjemputan' => $kodePenjemputan,
                'id_daerah' => $daerah->id_daerah,
                'id_dropbox' => $dropboxIds[array_rand($dropboxIds)],
                'id_pengguna_masyarakat' => $penggunaMasyarakat->id_pengguna,
                'id_pengguna_kurir' => $penggunaKurirIds[array_rand($penggunaKurirIds)],
                'total_berat' => 0, // init
                'total_poin' => 0, // init
                'tanggal_penjemputan' => now(),
                'alamat_penjemputan' => $daerah->nama_daerah . ', ' . $penggunaMasyarakat->alamat,
                'catatan' => $faker->realText(rand(50, 100)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('penjemputan')->insert($data);
    }
}