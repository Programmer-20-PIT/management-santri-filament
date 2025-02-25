<?php

namespace Database\Factories;

use App\Models\Departement;
use App\Models\Kelas;
use App\Models\ProgramStage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Empty_;

use function PHPUnit\Framework\isNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $nameEmail = str_replace(' ', '', $name);
        $entryDate = fake()->date();

        return [
           'name' => $name,
            'email' => $nameEmail.'@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('1'),
            'remember_token' => Str::random(20),
            'no_ktp' => Str::random(20),
            'nisn' => Str::random(20),
            'gender' => fake()->randomElement(['Pria', 'Wanita']),
            'date_of_birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'generation' => fake()->numberBetween(1, 10),
            'entry_date' => $entryDate,
            'graduate_date' => fake()->dateTimeBetween($entryDate, date('Y-m-d', strtotime($entryDate . ' +' . fake()->numberBetween(2, 10) . ' years'))),
            'status_graduate' => fake()->randomElement(['LULUS', 'ON PROGRESS', 'TIDAK LULUS','DROPOUT','KELUAR']),
            // 'kelas_id' => Kelas::factory(),
            // 'department_id' => Departement::all()->random()->id,
            // 'program_stage_id' => ProgramStage::all()->random()->id,
            'role' => fake()->randomElement(['ADMIN', 'SANTRI', 'MENTOR','LEADER','USTADZ']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
