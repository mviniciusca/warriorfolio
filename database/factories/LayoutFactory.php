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
            'hero_section_title' => 'building the what\'s next <br/>with <span class="text-highlight">laravel</span> + filament',
            'hero_section_subtitle_text' => 'warriorfolio is a free, open source, <br/> cms for creating and managing your own website.',
            'portfolio_section_title' => 'Portfolio',
            'portfolio_section_subtitle_text' => 'Here are some of my projects I\'ve worked on recently',
            'about_section_title' => 'Let\'s start with a <span class="text-highlight">hello</span>',
            'about_section_subtitle_text' => 'I\'m a full-stack developer based in Rio de Janeiro, Brazil specializing in building (and occasionally designing) exceptional websites, applications, and everything in between.',
            'contact_section_title' => 'Get <span class="text-highlight">in touch</span>',
            'contact_section_subtitle_text' => 'I\'m currently available for freelance work',
            'clients_section_title' => 'Trusted by <span class="text-highlight"> companies </span> <br /> big and small',
            'clients_section_subtitle_text' => 'Here are some of the companies I\'ve worked with',
            'newsletter_section_title' => 'the what\'s <span class="text-highlight">next</span>',
            'newsletter_section_subtitle_text' => 'join our newsletter and stay updated on new projects and features.',
            'newsletter_section_button_text' => 'Join',
        ];
    }
}
