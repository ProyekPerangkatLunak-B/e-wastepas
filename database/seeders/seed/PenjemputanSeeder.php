<?php

namespace Database\Seeders\seed;

use App\Models\Daerah;
use App\Models\Dropbox;
use App\Models\Pengguna;
use App\Models\Penjemputan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjemputanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daerahs = Daerah::all();
        $dropboxes = Dropbox::all();
        $penggunaMasyarakat = Pengguna::whereHas('peran', function ($query) {
            $query->where('nama_peran', 'Masyarakat');
        })->get();
        $penggunaKurir = Pengguna::whereHas('peran', function ($query) {
            $query->where('nama_peran', 'Kurir');
        })->get();

        // Validasi data
        if ($daerahs->isEmpty() || $dropboxes->isEmpty() || $penggunaMasyarakat->isEmpty() || $penggunaKurir->isEmpty()) {
            $this->command->error('Pastikan tabel "daerah", "dropbox", dan pengguna memiliki data.');
            return;
        }

        foreach (range(1, 50) as $index) {
            $kurir = $penggunaKurir->random();
            $masyarakat = $penggunaMasyarakat->random();
            $daerah = $daerahs->random();
            $dropbox = $dropboxes->random();

            Penjemputan::create([
                'id_daerah' => $daerah->id_daerah,
                'id_dropbox' => $dropbox->id_dropbox,
                'id_pengguna_masyarakat' => $masyarakat->id_pengguna,
                'id_pengguna_kurir' => $kurir->id_pengguna,
                'total_berat' => 0,
                'total_poin' => 0,
                'tanggal_penjemputan' => now()->subDays(rand(1, 30)),
                'alamat_penjemputan' => "Alamat Penjemputan {$index}, {$daerah->nama_daerah}",
                'catatan' => $index % 5 === 0 ? "Catatan untuk penjemputan {$index}" : null,
            ]);
        }
    }
}
