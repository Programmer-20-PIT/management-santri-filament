<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = $this->faker->word() . '.' . $this->faker->fileExtension();

        return [
            'attachment_name' => $fileName,
            'attachment_path' => 'uploads/' . $fileName, // Simulasi path penyimpanan
        ];
    }
}
