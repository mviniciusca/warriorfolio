<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Z3d0X\FilamentFabricator\Models\Page;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        return [
            'title'  => 'Landing Page',
            'slug'   => '/',
            'blocks' => [
                [
                    'data' => ['beam_background_active' => null],
                    'type' => 'design.blur-background',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'header',
                ],
                [
                    'data' => ['class' => 'py-3 md:py-6 lg:py-12'],
                    'type' => 'design.empty-separator',
                ],
                [
                    'data' => [
                        'is_active'     => true,
                        'is_center'     => true,
                        'bumper_tag'    => 'New',
                        'bumper_icon'   => '',
                        'bumper_link'   => null,
                        'bumper_role'   => 'primary',
                        'is_animated'   => true,
                        'bumper_title'  => "Warriorfolio v2.0.4 is here 🎉 Let's fly now! 🚀",
                        'bumper_target' => '_self',
                    ],
                    'type' => 'component.info-bumper',
                ],
            ],
            'layout'     => 'default',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function about(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'title'  => 'About',
                'slug'   => 'about',
                'blocks' => [
                    [
                        'data' => ['active' => null],
                        'type' => 'header',
                    ],
                    [
                        'data' => ['class' => 'py-3 md:py-6 lg:py-12'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'title'    => 'About Me',
                            'subtitle' => 'Welcome to my portfolio',
                        ],
                        'type' => 'component.hero-section',
                    ],
                ],
            ];
        });
    }

    public function contact(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'title'  => 'Contact',
                'slug'   => 'contact',
                'blocks' => [
                    [
                        'data' => ['active' => null],
                        'type' => 'header',
                    ],
                    [
                        'data' => ['class' => 'py-3 md:py-6 lg:py-12'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'title'    => 'Contact Me',
                            'subtitle' => 'Get in touch',
                        ],
                        'type' => 'component.contact-form',
                    ],
                ],
            ];
        });
    }
}
