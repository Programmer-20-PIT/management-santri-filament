<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendence>
 */
class AttendenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'santri_id' => User::count() ? User::all()->random()->id : User::factory()->create()->id,
            // 'activity_id' => Activity::count() ? Activity::all()->random()->id : Activity::factory()->create()->id,
            'activity_date' => fake()->date('Y-m-d'),
            'status' => fake()->randomElement(['hadir', 'tidak hadir', 'izin', 'sakit']),
        ];
    }
}
