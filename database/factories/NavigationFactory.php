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
                ['url' => '/', 'name' => 'Homepage', 'target' => false, 'is_active' => true, 'is_secondary' => false],
                ['url' => config('app.url').'/'.'#about', 'name' => 'About Me', 'target' => false, 'is_active' => true, 'is_secondary' => false],
                ['url' => config('app.url').'/'.'#portfolio', 'name' => 'Projects', 'target' => false, 'is_active' => true, 'is_secondary' => false],
                ['url' => config('app.url').'/blog', 'name' => 'Notes <span class="saturn-notify"></span>', 'target' => false, 'is_active' => true, 'is_secondary' => false],
                ['url' => config('app.url').'/'.'#contact', 'name' => 'Talk', 'target' => false, 'is_active' => true, 'is_secondary' => false],

                // Secondary navigation

                ['url' => '/docs', 'name' => 'Docs <span class="saturn-notify"></span>', 'target' => false, 'is_active' => true, 'is_secondary' => true],
                ['url' => 'https://github.com/mviniciusca/warriorfolio', 'name' => 'Github', 'target' => true, 'is_active' => true, 'is_secondary' => true],
            ],
        ];
    }
}
