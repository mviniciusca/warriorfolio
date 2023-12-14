<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layout>
 */
class LayoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hero_section_title' => 'building the what\'s next with laravel + filament',
            'hero_section_subtitle_text' => 'Warriorfolio is a free, open source, self-hosted admin panel for Laravel apps',
            'portfolio_section_title' => 'Portfolio',
            'portfolio_section_subtitle_text' => 'Here are some of my projects I\'ve worked on recently',
            'about_section_title' => 'About Me',
            'about_section_subtitle_text' => 'I\'m a full-stack developer based in the Philippines',
            'contact_section_title' => 'Contact Me',
            'contact_section_subtitle_text' => 'I\'m currently available for freelance work',
            'clients_section_text' => 'Trusted by companies big and small',
            'clients_section_subtitle_text' => 'Here are some of the companies I\'ve worked with',
        ];
    }
}
