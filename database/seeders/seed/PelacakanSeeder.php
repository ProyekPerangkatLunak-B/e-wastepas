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

        $statusDefault = ['Diproses', 'Dibatalkan'];

        $dibatalkan = 0;

        $data = [];
        foreach ($penjemputanData as $penjemputan) {
            // Tambah kan waktu penjemputan dari table penjemputan dan tambahkan
            $estimasiWaktu = \Carbon\Carbon::parse($penjemputan->tanggal_penjemputan)
                ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

            if ($dibatalkan > 4) {
                $statusDefault = ['Diproses'];
            } else {
                $dibatalkan++;
            }

            $data[] = [
                'id_penjemputan' => $penjemputan->id_penjemputan,
                'id_dropbox' => $penjemputan->id_dropbox,
                'keterangan' => $faker->realText(rand(50, 100)),
                'status' => $statusDefault[array_rand($statusDefault)],
                'estimasi_waktu' => $estimasiWaktu,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pelacakan')->insert($data);

        // Pelacakan Lanjutan
        $status = ['Diterima', 'Dijemput Kurir', 'Menuju Lokasi Penjemputan', 'Sampah Diangkut', 'Menuju Dropbox', 'Menyimpan Sampah di Dropbox', 'Selesai'];
        $currentStatus = 'Diproses';

        foreach ($status as $nextStatus) {
            $records = Pelacakan::where('status', $currentStatus)->get();
            if ($records->count() > 0) {
                foreach ($records as $record) {
                    if (rand(0, 1) == 1) {
                        $estimasiWaktu = \Carbon\Carbon::parse($record->estimasi_waktu)
                            ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                            ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                        $createUpdate = \Carbon\Carbon::parse($record->created_at)
                            ->addHours(rand(2, 6)) // Tambahkan antara 2 sampai 6 jam
                            ->addDays(rand(0, 1)); // kadang tambahkan 1 hari

                        Pelacakan::create([
                            'id_penjemputan' => $record->id_penjemputan,
                            'id_dropbox' => $record->id_dropbox,
                            'keterangan' => $faker->realText(rand(50, 100)),
                            'status' => $nextStatus,
                            'estimasi_waktu' => $estimasiWaktu,
                            'created_at' => $createUpdate,
                            'updated_at' => $createUpdate,
                        ]);
                    }
                }
            }
            $currentStatus = $nextStatus;
        }
    }
}
