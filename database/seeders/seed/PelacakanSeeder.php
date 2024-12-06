<?php

namespace Database\Seeders\seed;

use App\Models\Pelacakan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PelacakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $pelacakan = [
        //     [
        //         'id_penjemputan' => 1,
        //         'id_dropbox' => 1,
        //         'keterangan' => 'Sampah telah dijemput',
        //         'status' => 'Diterima',
        //         'estimasi_waktu' => '2024-11-05 09:20:52',
        //     ],
        //     [
        //         'id_penjemputan' => 2,
        //         'id_dropbox' => 2,
        //         'keterangan' => 'Sampah telah dijemput',
        //         'status' => 'Diterima',
        //         'estimasi_waktu' => '2024-11-05 09:20:52',
        //     ],
        //     [
        //         'id_penjemputan' => 3,
        //         'id_dropbox' => 3,
        //         'keterangan' => 'Sampah telah dijemput',
        //         'status' => 'Diterima',
        //         'estimasi_waktu' => '2024-11-05 09:20:52',
        //     ],
        // ];

        // foreach ($pelacakan as $data) {
        //     Pelacakan::create($data);
        // }
        $faker = Faker::create('id_ID');
        $penjemputanData = DB::table('penjemputan')->get();

        $data = [];
        foreach ($penjemputanData as $penjemputan) {
            // Tambah kan waktu penjemputan dari table penjemputan dan tambahkan
            $estimasiWaktu = \Carbon\Carbon::parse($penjemputan->tanggal_penjemputan)
                ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

            $data[] = [
                'id_penjemputan' => $penjemputan->id_penjemputan,
                'id_dropbox' => $penjemputan->id_dropbox,
                'keterangan' => $faker->realText(rand(50, 100)),
                'status' => ($penjemputan->status == 'Diterima') ? 'Dijemput Driver' : 'Menunggu Konfirmasi',
                'estimasi_waktu' => $estimasiWaktu,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pelacakan')->insert($data);
    }
}
