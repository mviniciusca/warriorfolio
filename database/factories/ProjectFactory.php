<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'short_description' => $this->faker->paragraph(3),
            // 'category_id'       => $this->faker->numberBetween(1, 5),
            // 'is_active'         => true,
            // 'created_at'        => now(),
            // 'image_cover'       => 1,
            // 'content'           => $this->faker->paragraph(10),
            // 'external_link'     => $this->faker->url(),
        ];
    }
}
