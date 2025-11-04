<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content'     => $this->faker->paragraphs(5, true),
            'resume'      => $this->faker->paragraph(),
            'is_active'   => true,
            'is_featured' => $this->faker->boolean(20), // 20% chance of being featured
            'style'       => 'default',
            'img_cover'   => null,
        ];
    }
}
