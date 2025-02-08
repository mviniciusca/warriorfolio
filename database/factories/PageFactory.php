<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Z3d0X\FilamentFabricator\Models\Page;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence,
            'style'       => 'blog',
            'content'     => $this->faker->paragraph,
            'slug'        => $this->faker->slug,
            'category_id' => 1,
            'is_active'   => true,
            'blocks'      => [
                [
                    'data' => [],
                    'type' => 'blog.post',
                ],
            ],
        ];
    }
}
