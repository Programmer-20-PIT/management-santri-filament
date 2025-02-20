<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SantriFamily>
 */
class SantriFamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kk'         => fake()->numerify('################'), // 16 digit angka
            'father_name'   => fake()->name('male'),
            'father_job'    => fake()->jobTitle(),
            'father_birth'  => fake()->numberBetween(1950, 1985), // Tahun lahir ayah
            'father_phone'  => fake()->phoneNumber(),
            'mother_name'   => fake()->name('female'),
            'mother_job'    => fake()->jobTitle(),
            'mother_birth'  => fake()->numberBetween(1955, 1990), // Tahun lahir ibu
            'mother_phone'  => fake()->phoneNumber(),

        ];
    }
}
