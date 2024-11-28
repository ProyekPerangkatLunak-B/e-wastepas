<?php

namespace Database\Factories;

use App\Models\Daerah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daerah>
 */
class DaerahFactory extends Factory
{
    protected $model = Daerah::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_daerah' => $this->faker->state(),
            'status_daerah' => $this->faker->boolean(50),
            'total_dropbox' => $this->faker->numberBetween(1, 100),
        ];
    }
}
