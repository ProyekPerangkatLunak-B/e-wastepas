<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailPenjemputanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('detail_penjemputan')->insert([
            [
                'id_penjemputan' => 1,
                'id_jenis' => 1,
                'berat' => 3.5,
                'catatan' => 'Plastik botol bekas',
                'dibuat_pada' => Carbon::now(),
                'diperbarui_pada' => Carbon::now(),
            ],
        ]);
    }
}
