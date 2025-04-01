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
            'name'      => $this->faker->word(),
            'slug'      => Str::slug($this->faker->sentence(2)),
            'is_active' => true,
            'hex_color' => $this->faker->hexColor(),
            'icon'      => $this->faker->randomElement([
                'logo-laravel',
                'logo-github',
                'logo-vercel',
                'logo-dribbble',
                'logo-behance',
            ]),
        ];
    }
}
