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
            'resume'      => $this->faker->paragraph(),
            'content'     => $this->faker->paragraph(50),
            'slug'        => env('APP_BLOG_PATH').$this->faker->slug.env('APP_BLOG_URL_END'),
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
