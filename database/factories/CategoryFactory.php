<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'      => Str::ucfirst($this->faker->word()),
            'slug'      => $this->faker->slug(),
            'is_active' => true,
            'hex_color' => $this->faker->hexColor(),
            'icon'      => 'logo-octocat',
        ];
    }
}
