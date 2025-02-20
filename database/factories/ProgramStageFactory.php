<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramStage>
 */
class ProgramStageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->jobTitle(),
            'description' => fake()->text(),
            'start_date'  => fake()->date('Y-m-d'),
            'end_date'    => fake()->date('Y-m-d', 'now'),
        ];
    }
}
