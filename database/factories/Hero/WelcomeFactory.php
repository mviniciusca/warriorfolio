<?php

namespace Database\Factories\Hero;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero\Welcome>
 */
class WelcomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => "Building the what's next <br/>with Laravel + <span class='main-gradient-text'>Filament</span>",
            'subtitle'      => 'Open Source Portfolio Landing Page System',
        ];
    }
}
