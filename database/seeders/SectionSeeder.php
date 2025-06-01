<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'name'    => 'about me',
                'slug'    => 'about-me',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'About Me',
                    'subtitle'           => 'I am a passionate developer',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'services',
                'slug'    => 'services',
                'content' => [
                    'title'    => 'My Services',
                    'subtitle' => 'I offer a variety of services',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'portfolio',
                'slug'    => 'portfolio',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'My Portfolio',
                    'subtitle'           => 'Check out my work',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'contact',
                'slug'    => 'contact',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'Get in Touch',
                    'subtitle'           => 'I would love to hear from you',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'blog',
                'slug'    => 'blog',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'My Blog',
                    'subtitle'           => 'Read my latest articles',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'hero',
                'slug'    => 'hero',
                'content' => [
                    'title'    => 'Welcome to My Portfolio',
                    'subtitle' => 'I am a passionate developer',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'clients',
                'slug'    => 'clients',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'My Clients',
                    'subtitle'           => 'I have worked with amazing clients',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'newsletter',
                'slug'    => 'newsletter',
                'content' => [
                    'title'    => 'Subscribe to My Newsletter',
                    'subtitle' => 'Stay updated with my latest news',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'footer',
                'slug'    => 'footer',
                'content' => [
                    'title'    => 'Footer Section',
                    'subtitle' => 'This is the footer section',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
            [
                'name'    => 'github-repositories',
                'slug'    => 'github-repositories',
                'content' => [
                    'is_heading_visible' => 1,
                    'title'              => 'My GitHub Projects',
                    'subtitle'           => 'Check out my open source contributions',

                ],
                'is_active'  => 1,
                'is_coupled' => 0,
            ],
        ];

        foreach ($sections as $section) {
            $section['content'] = json_encode($section['content']);
            DB::table('sections')->insert($section);
        }
    }
}
