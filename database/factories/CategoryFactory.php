<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => 'Laravel',
            'slug' => 'laravel',
            'is_active' => true,
            'hex_color' => '#fb503b',
            'icon' => 'logo-octocat',
        ];
    }

    /** Create a project after create a category */

    public function configure(): self
    {
        return $this->afterCreating(function (\App\Models\Category $category) {
            \App\Models\Project::factory()
                ->count(1)
                ->create([
                    'category_id' => $category->id,
                ]);
        });
    }

}
