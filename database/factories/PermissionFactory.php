<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->date();
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 month')->format('Y-m-d');

        return [
            'reason' => fake()->paragraph(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
