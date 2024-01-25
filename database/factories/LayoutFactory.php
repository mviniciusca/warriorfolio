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
            /** Hero Section */
            'hero_section_title' => 'Building the what\'s next <br/>
            with <span class="text-highlight">Laravel</span> + Filament',
            'hero_section_subtitle_text' => 'Warriorfolio is a free, open source, <br/>
            cms for creating and managing your portfolio website.',

            /** Portfolio Section */
            'portfolio_section_title' => 'Experience <span class="text-highlight">Matters</span>',
            'portfolio_section_subtitle_text' => 'Here are some of my projects I\'ve worked on recently',

            /** About Section */
            'about_section_title' => 'Let\'s start with a <span class="text-highlight">hello</span>',
            'about_section_subtitle_text' => 'I\'m a full-stack developer based in Rio de Janeiro, Brazil specializing in building (and occasionally designing) exceptional websites, applications, and everything in between.',

            /** Contact Section */
            'contact_section_title' => 'Get <span class="text-highlight">in Touch</span>',
            'contact_section_subtitle_text' => 'I\'m currently available for freelance work',
            'contact_section_address' => 'Rio de Janeiro, Brazil',
            'contact_section_email' => 'warriorfolio@test.dev',

            /** Clients Section */
            'clients_section_title' => '<span class="text-highlight">Trusted</span> by',
            'clients_section_subtitle_text' => 'Here are some of the companies I\'ve worked with',

            /** Newsletter Module */
            'newsletter_section_title' => 'the what\'s <span class="text-highlight">next</span>',
            'newsletter_section_subtitle_text' => 'join our newsletter and stay updated on new projects and features.',
            'newsletter_section_button_text' => 'Join',
        ];
    }
}
