<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PenjemputanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $dat = 10; // jumlah data eksekusi

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
            $daerah = DB::table('daerah')
                ->where('id_daerah', $daerahIds[array_rand($daerahIds)])
                ->first();
            $penggunaMasyarakat = DB::table('pengguna')
                ->where('id_pengguna', $penggunaMasyarakatIds[array_rand($penggunaMasyarakatIds)])->first();

            $data[] = [
                'id_daerah' => $daerah->id_daerah,
                'id_dropbox' => $dropboxIds[array_rand($dropboxIds)],
                'id_pengguna_masyarakat' => $penggunaMasyarakat->id_pengguna,
                'id_pengguna_kurir' => $penggunaKurirIds[array_rand($penggunaKurirIds)],
                'total_berat' => 0, // init
                'total_poin' => 0, // init
                'tanggal_penjemputan' => now(),
                'alamat_penjemputan' => $i . '. ' . $daerah->nama_daerah . ', ' . $penggunaMasyarakat->alamat,
                'catatan' => $i . ". " . $faker->realText(rand(50, 100)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('penjemputan')->insert($data);
    }
}
