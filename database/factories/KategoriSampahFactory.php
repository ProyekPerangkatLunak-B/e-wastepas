<?php

namespace Database\Factories;
use App\Models\KategoriSampah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriSampah>
 */
class KategoriSampahFactory extends Factory
{
    protected $model = KategoriSampah::class;

    public function definition(): array
    {
        return [
            // 'id_kategori_sampah' => $this->faker->unique(),
            'nama_kategori_sampah' => $this->faker->word, 
            'deskripsi_kategori_sampah' => $this->faker->sentence, 
        ];
    }
}
