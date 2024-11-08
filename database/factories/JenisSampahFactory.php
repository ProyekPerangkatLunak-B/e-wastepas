<?php

namespace Database\Factories;

use App\Models\JenisSampah;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KategoriSampah;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisSampah>
 */
class JenisSampahFactory extends Factory
{
    protected $model = JenisSampah::class;
    public function definition(): array
    {
        return [
            'id_jenis_sampah' => $this->faker->unique()->numberBetween(1, 1000),
            'id_kategori_sampah' => KategoriSampah::factory(),
            'nama_jenis_sampah' => $this->faker->word, 
            'deskripsi_jenis_sampah' => $this->faker->sentence, 
            'poin' => $this->faker->numberBetween(1, 100),
        ];
    }
}
