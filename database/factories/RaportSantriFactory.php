<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RaportSantri>
 */
class RaportSantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'academic_year' => fake()->year() . '/' . (fake()->year() + 1),
            'overall_score' => fake()->numberBetween(0, 100),
            'strengths' => fake()->paragraph(),
            'weaknesses' => fake()->paragraph(),
        ];
    }
}
