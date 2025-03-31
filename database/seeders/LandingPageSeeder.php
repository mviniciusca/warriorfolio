<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')
            ->insert([
                'layout'     => 'default',
                'title'      => 'Landing Page',
                'slug'       => '/',
                'created_at' => now(),
                'updated_at' => now(),
                'blocks'     => json_encode([
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'hero',
                    ],
                    [
                        'type' => 'component.feature-list',
                        'data' => [
                            'is_heading_active'          => false,
                            'module_title'               => 'Welcome to Warriorfolio.',
                            'module_subtitle'            => 'Portfolio builder for developers and designers.',
                            'columns'                    => 3,
                            'is_active'                  => true,
                            'is_light_fx'                => true,
                            'is_color_icon'              => false,
                            'is_card_filled'             => false,
                            'is_center'                  => false,
                            'is_content_center'          => false,
                            'is_filled_inverted'         => true,
                            'is_section_filled_inverted' => false,
                            'is_border'                  => true,
                            'with_padding'               => false,
                            'features'                   => [
                                [
                                    'icon'          => 'lock-open-outline',
                                    'title'         => 'Start Customizing',
                                    'description'   => 'Customize your portfolio with a few clicks.',
                                    'link'          => '/admin',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'document-text-outline',
                                    'title'         => 'Documentation',
                                    'description'   => 'Learn how to setup and deploy your portfolio.',
                                    'link'          => '/docs',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'logo-github',
                                    'title'         => 'Github Repository',
                                    'description'   => 'Contribute to the project on Github.',
                                    'link'          => 'https://github.com/mviniciusca/warriorfolio',
                                    'is_new_window' => true,
                                ],

                            ],
                        ],
                    ],
                    [
                        'data' => [],
                        'type' => 'blog.featured-posts',
                    ],
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'courses',
                    ],
                    [
                        'data' => [
                            'color' => 'pink',
                        ],
                        'type' => 'design.blur-beam',
                    ],
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'projects',
                    ],
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'client',
                    ],
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'newsletter',
                    ],
                    [
                        'data' => [
                            'active' => null,
                        ],
                        'type' => 'contact',
                    ],
                    [
                        'data' => [
                            'color' => 'pink',
                        ],
                        'type' => 'design.blur-beam',
                    ],
                ]),
            ]);
    }
}
