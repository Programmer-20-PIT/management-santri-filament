<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departement>
 */
class DepartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            // 'leader_id' => User::count() ? User::all()->random()->id : User::factory()->create()->id,
            // 'co_leader_id' => User::count() ? User::all()->random()->id : User::factory()->create()->id,
        ];
    }
}
