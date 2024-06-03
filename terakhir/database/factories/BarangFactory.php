<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => $this->faker->sentence(1),
            'harga' => $this->faker->numberBetween(100000, 1000000),
            'deskripsi' => $this->faker->text(),
            'stok' => $this->faker->numberBetween(1, 100),
        ];
    }
}
