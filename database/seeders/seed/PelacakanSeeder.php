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

        // Pelacakan Lanjutan
        $dijemput = DB::table('pelacakan')->where('status', 'Dijemput Driver')->get();
        if ($dijemput->count() > 0) {
            foreach ($dijemput as $d) {
                if (rand(0, 1) == 1) {

                    $estimasiWaktu = \Carbon\Carbon::parse($d->estimasi_waktu)
                        ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                        ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                    $createUpdate = \Carbon\Carbon::parse($d->created_at)
                        ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                        ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                    Pelacakan::create([
                        'id_penjemputan' => $d->id_penjemputan,
                        'id_dropbox' => $d->id_dropbox,
                        'keterangan' => $faker->realText(rand(50, 100)),
                        'status' => 'Menuju Dropbox',
                        'estimasi_waktu' => $estimasiWaktu,
                        'created_at' => $createUpdate,
                        'updated_at' => $createUpdate,
                    ]);
                }
            }
            $menuju = DB::table('pelacakan')->where('status', 'Menuju Dropbox')->get();
            if ($menuju->count() > 0) {
                foreach ($menuju as $m) {
                    if (rand(0, 1) == 1) {
                        $estimasiWaktu = \Carbon\Carbon::parse($m->estimasi_waktu)
                            ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                            ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                        $createUpdate = \Carbon\Carbon::parse($m->created_at)
                            ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                            ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                        Pelacakan::create([
                            'id_penjemputan' => $m->id_penjemputan,
                            'id_dropbox' => $m->id_dropbox,
                            'keterangan' => $faker->realText(rand(50, 100)),
                            'status' => 'Sudah Sampai',
                            'estimasi_waktu' => $estimasiWaktu,
                            'created_at' => $createUpdate,
                            'updated_at' => $createUpdate,
                        ]);
                    }
                }
            }
        }
    }
}
