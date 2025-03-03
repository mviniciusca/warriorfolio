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
            'title'       => 'Blog Page',
            'style'       => 'blog',
            'resume'      => 'This is a resume test!',
            'content'     => 'Some content goes here',
            'slug'        => env('APP_BLOG_PATH', 'blog/post/').'blog-page'.env('APP_BLOG_URL_END', '.html'),
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
