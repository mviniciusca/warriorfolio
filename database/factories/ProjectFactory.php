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
            'title' => $this->faker->jobTitle,
            'slug'  => $this->faker->slug,
            'about' => $this->faker->paragraph,
            'cover' => $this->faker->boolean,
            'tag'   => $this->faker->word,
            'link'  => $this->faker->url,
            'about' => $this->faker->paragraph,
        ];
    }
}
