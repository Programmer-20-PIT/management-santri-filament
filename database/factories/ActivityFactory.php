<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_name' => fake()->sentence(),
            'activity_date' => fake()->date('Y-m-d'),
            'description' => fake()->text(),
            'is_event' => fake()->boolean(),
        ];
    }
}
