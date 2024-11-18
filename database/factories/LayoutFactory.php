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
                'google_maps_code' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.92427140858!2d-43.259202624692705!3d-22.805269779326643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99798f3b16364f%3A0xcfa9dfbf2f584512!2sAeroporto%20Internacional%20do%20Rio%20de%20Janeiro%2FGale%C3%A3o%E2%80%93Antonio%20Carlos%20Jobim!5e0!3m2!1spt-BR!2sbr!4v1731908328521!5m2!1spt-BR!2sbr',
            ],

            /** Clients Section */
            'customer' => [
                'section_fill'     => false,
                'section_title'    => '<span class="tl">Trusted</span> by',
                'section_subtitle' => 'Here are some of the companies I\'ve worked with',
            ],

            /** Newsletter Module */
            'mailing' => [
                'section_title'    => 'the<span class="tl">next</span>',
                'section_subtitle' => 'join our mailing list',
                'button_text'      => 'Subscribe',
            ],
        ];
    }
}
