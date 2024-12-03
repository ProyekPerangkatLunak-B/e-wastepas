<?php

namespace Database\Seeders\seed;

use App\Models\Pelacakan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class PelacakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelacakan = [
            [
                'id_penjemputan' => 1,
                'id_dropbox' => 1,
                'keterangan' => 'Sampah telah dijemput',
                'status' => 'Diterima',
                'estimasi_waktu' => '2024-11-05 09:20:52',
            ],
            [
                'id_penjemputan' => 2,
                'id_dropbox' => 2,
                'keterangan' => 'Sampah telah dijemput',
                'status' => 'Diterima',
                'estimasi_waktu' => '2024-11-05 09:20:52',
            ],
            [
                'id_penjemputan' => 3,
                'id_dropbox' => 3,
                'keterangan' => 'Sampah telah dijemput',
                'status' => 'Diterima',
                'estimasi_waktu' => '2024-11-05 09:20:52',
            ],
        ];

        foreach ($pelacakan as $data) {
            Pelacakan::create($data);
        }
    }
}
