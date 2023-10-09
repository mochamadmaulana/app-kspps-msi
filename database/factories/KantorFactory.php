<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kantor>
 */
class KantorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kantor' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'no_telepone' => fake()->e164PhoneNumber(),
            'alamat' => fake()->address(),
        ];
    }
}
