<?php

namespace Database\Seeders\seed;

use App\Models\Penjemputan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            $hariIni = now()->format('ym');
            $dropboxId = $dropboxIds[array_rand($dropboxIds)];

            // Filter untuk mencari kode penjemputan dengan pola tertentu dalam array $data
            $filteredData = array_filter($data, function ($item) use ($dropboxId, $hariIni) {
                return str_starts_with($item['kode_penjemputan'], 'D' . str_pad($dropboxId, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni);
            });

            if (!empty($filteredData)) {
                // Ambil elemen terakhir berdasarkan kode penjemputan terbesar
                $kodeAkhir = collect($filteredData)->sortByDesc('kode_penjemputan')->first();
                $kodeUrut = (int) substr($kodeAkhir['kode_penjemputan'], -3, 3) + 1;
                $kodeUrut = str_pad($kodeUrut, 3, '0', STR_PAD_LEFT);
                $kodePenjemputan = 'D' . str_pad($dropboxId, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . $kodeUrut;
            } else {
                // Jika tidak ada data yang cocok, mulai dari urutan 001
                $kodePenjemputan = 'D' . str_pad($dropboxId, 3, '0', STR_PAD_LEFT) . 'P' . $hariIni . '001';
            }

            // Tambahkan data penjemputan
            $data[] = [
                'kode_penjemputan' => $kodePenjemputan,
                'id_daerah' => $daerah->id_daerah,
                'id_dropbox' => $dropboxId,
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
