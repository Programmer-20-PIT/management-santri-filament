<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'santri_id'    => User::count() ? User::all()->random()->id : User::factory()->create()->id, // atau bisa juga menggunakan User::inRandomOrder()->first()->id jika user sudah ada
            // 'lesson_id' => Lesson::count() ? Lesson::all()->random()->id : Lesson::factory()->create()->id, // asumsikan Lessons dikelola oleh model Lesson
            'score'      => fake()->randomFloat(2, 0, 100),
            'evaluation' => fake()->paragraph(),
            'date'       => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
