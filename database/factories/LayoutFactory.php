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
            'hero_section_title' => 'Portfolio for the <span class="text-highlight">Creative</span> Developer',
            'hero_section_subtitle_text' => 'Warriorfolio is a free, open source, <br/>
            cms for creating and managing your portfolio website.',
            'hero_section_button_text' => 'my work',
            'hero_section_button_url' => '#portfolio',
            'hero_button_link_target' => '_self',
            'hero_alt_button_text' => 'on the github',
            'hero_alt_button_url' => 'https://github.com/mviniciusca',
            'hero_alt_button_link_target' => '_blank',

            /** Portfolio Section */
            'portfolio_section_title' => 'My <span class="text-highlight">Portfolio</span>',
            'portfolio_section_subtitle_text' => 'Here are some of my projects I\'ve worked on recently',

            /** About Section */
            'about_section_title' => 'Let\'s start with a <span class="text-highlight">Hello</span>',
            'about_section_subtitle_text' => 'I\'m a full-stack developer based in Rio de Janeiro, Brazil specializing in building (and occasionally designing) exceptional websites, applications, and everything in between.',

            /** Contact Section */
            'contact_section_title' => 'Get <span class="text-highlight">in Touch</span>',
            'contact_section_subtitle_text' => 'I\'m currently available for freelance work',
            'contact_section_address' => 'Av. Rio de Janeiro, S/N <br/> Rio de Janeiro, RJ <br/> Brazil',
            'contact_section_email' => 'warriorfolio@test.dev',
            'contact_section_phone' => '+55 21 99999-9999',

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
