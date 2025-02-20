<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialRecord>
 */
class FinancialRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category'          => fake()->randomElement(['Food', 'Transport', 'Bills', 'Shopping', 'Salary']),
            'description'       => fake()->sentence(),
            'transaction_type'  => fake()->randomElement(['income', 'expense']),
            'amount'            => fake()->numberBetween(10000, 5000000), // Nominal acak antara 10rb - 5jt
            'transaction_date'  => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
