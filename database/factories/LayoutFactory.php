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
            'hero' => [
                /** Website Content */
                'section_title'    => 'Portfolio for the <span class="tl">Creative</span> Developer',
                'section_subtitle' => 'Warriorfolio is a free, open source,<br/> cms for creating and managing your portfolio website.',
                /** Buttons */
                'buttons' => [
                    [
                        'button_title'  => 'Github',
                        'button_url'    => 'https://github.com',
                        'button_style'  => 'filled',
                        'button_target' => '_self',
                    ],
                    [
                        'button_title'  => 'Documentation',
                        'button_url'    => 'https://vercel.app',
                        'button_style'  => 'outlined',
                        'button_target' => '_blank',
                    ],
                ],
                /** Themes */
                'theme' => 'default',
                /** Background */
                'is_active'   => false,
                'bg_position' => 'bg-center',
                'bg_size'     => 'bg-auto',
                'bg_repeat'   => 'bg-no-repeat',
            ],

            /** Portfolio Section */
            'portfolio' => [
                'section_fill'     => false,
                'section_title'    => 'My <span class="tl">Portfolio</span>',
                'section_subtitle' => 'Here are some of my projects I\'ve worked on recently.',
            ],

            /** About Section */
            'about' => [
                'section_fill'     => false,
                'section_title'    => 'Let\'s start with a <span class="tl">Hello</span>',
                'section_subtitle' => 'I\'m a full-stack developer based in Rio de Janeiro, Brazil specializing in building (and occasionally designing) exceptional websites, applications, and everything in between.',
            ],

            /** Contact Section */
            'contact' => [
                'section_fill'     => false,
                'section_title'    => 'Get <span class="tl">in Touch</span>',
                'section_subtitle' => 'I\'m currently available for freelance work',
                'public_address'   => 'Rio-GIG Airport </br> Av. 20 de Janeiro, S/N <br/> Rio de Janeiro, RJ <br/> Brazil',
                'public_email'     => 'warriorfolio@test.dev',
                'public_phone'     => '9999-9999',
            ],

            /** Clients Section */
            'clients_section_title'         => '<span class="tl">Trusted</span> by',
            'clients_section_subtitle_text' => 'Here are some of the companies I\'ve worked with',

            /** Newsletter Module */
            'newsletter_section_title'         => 'the<span class="tl">next</span>',
            'newsletter_section_subtitle_text' => 'join our mailing list',
            'newsletter_section_button_text'   => 'Subscribe',
        ];
    }
}
