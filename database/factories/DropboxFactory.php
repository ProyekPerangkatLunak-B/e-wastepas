<?php

namespace Database\Factories;

use App\Models\Daerah;
use App\Models\Dropbox;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dropbox>
 */
class DropboxFactory extends Factory
{
    protected $model = Dropbox::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_daerah' => Daerah::factory(),
            'nama_lokasi' => $this->faker->streetName(),
            'alamat' => $this->faker->address(),
            'status_dropbox' => $this->faker->boolean(80),
            'total_transaksi_dropbox' => $this->faker->numberBetween(1, 100),
            // 'diperbarui_pada' => $this->faker->dateTimeBetween('-1 years', 'now'),
            // 'diperbarui_pada' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
