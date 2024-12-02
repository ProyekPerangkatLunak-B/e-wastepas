<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Kategori 1 - Sampah Elektronik
            ['id_kategori' => 1, 'nama_jenis' => 'Kulkas', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik kulkas.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'AC', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik AC.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'TV', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik TV.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Mesin Cuci', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik mesin cuci.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Dispenser', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik dispenser.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Kipas Angin', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik kipas angin.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Rice Cooker', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik rice cooker.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Blender', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik blender.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Microwave', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik microwave.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Oven', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik oven.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Water Heater', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik water heater.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Vacuum Cleaner', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik vacuum cleaner.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Fan', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik fan.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Water Dispenser', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik water dispenser.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Water Purifier', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik water purifier.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 1, 'nama_jenis' => 'Water Heater', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik water heater.', 'poin' => 20, 'created_at' => now(), 'updated_at' => now()],


            // Kategori 2 - Komputer dan Perangkat Pendukung
            ['id_kategori' => 2, 'nama_jenis' => 'PC', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik PC.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Monitor', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik monitor.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Printer', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik printer.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Scanner', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik scanner.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'UPS', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik UPS.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Inverter', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik inverter.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Stabilizer', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik stabilizer.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Boiler', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik boiler.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Solar Panel', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik solar panel.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Server', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik server.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Router', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik router.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Switch', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik switch.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Modem', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik modem.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Access Point', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik access point.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 2, 'nama_jenis' => 'Firewall', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik firewall.', 'poin' => 10, 'created_at' => now(), 'updated_at' => now()],

            // Kategori 3 - Perangkat Kecil
            ['id_kategori' => 3, 'nama_jenis' => 'Mouse', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik mouse.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Keyboard', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik keyboard.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Charger', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik charger.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Kabel Data', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik kabel data.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Power Bank', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik power bank.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Earphone', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik earphone.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Speaker', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik speaker.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Headphone', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik headphone.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Smartwatch', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik smartwatch.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_kategori' => 3, 'nama_jenis' => 'Smartband', 'deskripsi_jenis' => 'Ini adalah jenis sampah elektronik smartband.', 'poin' => 5, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('jenis')->insert($data);
    }
}
