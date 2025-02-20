<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttachmentSantri>
 */
class AttachmentSantriFactory extends Factory
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
            // 'attachment_id' => Attachment::count() ? Attachment::all()->random()->id : attachment::factory()->create()->id,
        ];
    }
}
