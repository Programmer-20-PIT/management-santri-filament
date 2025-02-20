<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assesment>
 */
class AssesmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'score' => fake()->numberBetween(0, 100), // Nilai acak antara 0-100
            'evalitation' => fake()->sentence(), // Teks acak untuk evaluasi
            'date' => Carbon::now()->subDays(rand(1, 30)), // Tanggal acak dalam 30 hari terakhir
        ];
    }
}
