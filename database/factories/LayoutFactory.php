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
            'contact_section_address' => 'Rio de Janeiro, Brazil',
            'contact_section_email' => 'warriorfolio@test.dev',
            'contact_section_google_map' => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29420.930603803245!2d-43.2504982!3d-22.8166764!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99799368903d71%3A0xead21443a9686abf!2sGale%C3%A3o%2C%20Rio%20de%20Janeiro%20-%20State%20of%20Rio%20de%20Janeiro!5e0!3m2!1sen!2sbr!4v1705861844174!5m2!1sen!2sbr",
            'contact_section_phone' => '+5521999999999',
            'clients_section_title' => 'Trusted by <span class="text-highlight"> companies </span> <br /> big and small',
            'clients_section_subtitle_text' => 'Here are some of the companies I\'ve worked with',
            'newsletter_section_title' => 'the what\'s <span class="text-highlight">next</span>',
            'newsletter_section_subtitle_text' => 'join our newsletter and stay updated on new projects and features.',
            'newsletter_section_button_text' => 'Join',
        ];
    }
}
