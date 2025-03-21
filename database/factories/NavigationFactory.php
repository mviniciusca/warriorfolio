<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Navigation>
 */
class NavigationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => [
                ['url' => '/', 'name' => 'Homepage', 'target' => '_self', 'is_active' => true],
                ['url' => config('app.url').'/'.'#about', 'name' => 'About Me', 'target' => '_self', 'is_active' => true],
                ['url' => config('app.url').'/'.'#portfolio', 'name' => 'Projects', 'target' => '_self', 'is_active' => true],
                ['url' => config('app.url').'/blog', 'name' => 'Notes <span class="tag">new</span>', 'target' => '_self', 'is_active' => true],
                ['url' => config('app.url').'/'.'#contact', 'name' => 'Talk', 'target' => '_self', 'is_active' => true],
                ['url' => '/docs', 'name' => 'Docs <span class="tag">new</span>', 'target' => '_self', 'is_active' => true],
                ['url' => 'https://github.com/mviniciusca/warriorfolio', 'name' => 'Github', 'target' => '_blank', 'is_active' => true],
            ],
        ];
    }
}
