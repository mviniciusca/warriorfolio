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
                'section_title'    => 'clone, setup & <span class="dg">deploy</span>🚀',
                'section_subtitle' => 'Warriorfolio '.env('APP_VERSION').' is here with a UI refresh, new features, and improvements. <br/>Clone, setup, and deploy your portfolio in minutes.',
                /** Buttons */
                'buttons' => [
                    [
                        'button_title'  => 'Get Started',
                        'icon'          => 'rocket',
                        'button_url'    => '/admin',
                        'button_style'  => 'filled',
                        'button_target' => '_self',
                    ],
                    [
                        'button_title'  => 'Documentation',
                        'icon'          => 'book',
                        'button_url'    => '/docs',
                        'button_style'  => 'outlined',
                        'button_target' => '_self',
                    ],
                ],
                /** Themes */
                'theme'                    => 'sierra',
                'is_mailing_active'        => false,
                'featured_image_is_active' => true,
                /** Background */
                'is_active'   => false,
                'bg_position' => 'bg-center',
                'bg_size'     => 'bg-auto',
                'bg_repeat'   => 'bg-no-repeat',
            ],

            /** Portfolio Section */
            'portfolio' => [
                'section_fill'     => false,
                'section_title'    => 'Projects Showcase',
                'section_subtitle' => 'Here are some of the projects I\'ve worked on',
            ],

            /** About Section */
            'about' => [
                'section_fill'     => true,
                'section_title'    => 'About Me',
                'section_subtitle' => 'The About You section is where you introduce yourself and share your background, experiences, and passions. Highlight your career journey, skills, and what drives you. This is your space to make a strong impression and connect with others.',
            ],

            /** Contact Section */
            'contact' => [
                'section_fill'     => false,
                'section_title'    => 'Contact Me',
                'section_subtitle' => 'I\'m currently available for freelance work',
                'public_address'   => 'Rio-GIG Airport </br> Av. 20 de Janeiro, S/N <br/> Rio de Janeiro, RJ <br/> Brazil',
                'public_email'     => 'warriorfolio@test.dev',
                'public_phone'     => '9999-9999',
                'google_maps_code' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.92427140858!2d-43.259202624692705!3d-22.805269779326643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99798f3b16364f%3A0xcfa9dfbf2f584512!2sAeroporto%20Internacional%20do%20Rio%20de%20Janeiro%2FGale%C3%A3o%E2%80%93Antonio%20Carlos%20Jobim!5e0!3m2!1spt-BR!2sbr!4v1731908328521!5m2!1spt-BR!2sbr',
            ],

            /** Clients Section */
            'customer' => [
                'section_fill'     => true,
                'section_title'    => 'Trusted by',
                'section_subtitle' => 'Here are some of the companies I\'ve worked with',
            ],

            /** Newsletter Module */
            'mailing' => [
                'section_title'    => '<span class="dg">Warriornotes</span> Mailing List',
                'section_subtitle' => 'Join our mailing list.',
                'button_text'      => 'Subscribe',
            ],

            /** Footer Section */
            'footer' => [
                'section_fill' => true,
            ],
        ];
    }
}
