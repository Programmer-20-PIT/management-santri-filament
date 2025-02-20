<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activities>
 */
class ActivitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_name'  => fake()->sentence(3), // Nama aktivitas dengan 3 kata
            'activity_date'  => fake()->date(),
            'is_event'       => fake()->boolean(),
            'description'    => fake()->paragraph(3), // Deskripsi dengan 3 paragraf
        ];
    }
}
