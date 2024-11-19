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
                    'data' => ['color' => 'pink'],
                    'type' => 'design.blur-beam',
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
                        'bumper_icon'   => null,
                        'bumper_link'   => null,
                        'bumper_role'   => 'primary',
                        'is_animated'   => true,
                        'bumper_title'  => "Warriorfolio v2.0.4 is here 🎉 Let's fly now! 🚀",
                        'bumper_target' => '_self',
                    ],
                    'type' => 'component.info-bumper',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'hero',
                ],
                [
                    'data' => [
                        'slug'                    => 'whats-new',
                        'title'                   => "What's new?",
                        'subtitle'                => null,
                        'is_active'               => true,
                        'module_name'             => 'whats-new',
                        'tailwind_css_attributes' => ['text-primary-500'],
                    ],
                    'type' => 'component.module',
                ],
                [
                    'data' => [
                        'features' => [
                            [
                                'icon'        => 'sparkles',
                                'title'       => 'New in v2.0.4',
                                'description' => 'Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.\n',
                            ],
                            [
                                'icon'        => 'heart',
                                'title'       => 'New in v2.0.4',
                                'description' => 'Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.',
                            ],
                            [
                                'icon'        => 'logo-dribbble',
                                'title'       => 'New in v2.0.4',
                                'description' => 'Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.',
                            ],
                        ],
                        'is_active' => true,
                        'is_center' => true,
                    ],
                    'type' => 'component.feature-list',
                ],
                [
                    'data' => ['class' => 'py-1 md:py-2 lg:py-4'],
                    'type' => 'design.empty-separator',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'courses',
                ],
                [
                    'data' => ['color' => 'pink'],
                    'type' => 'design.blur-beam',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'projects',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'client',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'newsletter',
                ],
                [
                    'data' => ['color' => 'blur'],
                    'type' => 'design.blur-beam',
                ],
                [
                    'data' => ['active' => null],
                    'type' => 'contact',
                ],
                [
                    'data' => ['color' => 'pink'],
                    'type' => 'design.blur-beam',
                ],
            ],
            'layout'     => 'default',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

// [{"data": {"color": "pink"}, "type": "design.blur-beam"}, {"data": {"class": "py-3 md:py-6 lg:py-12"}, "type": "design.empty-separator"}, {"data": {"is_active": true, "is_center": true, "bumper_tag": "New", "bumper_icon": null, "bumper_link": null, "bumper_role": "primary", "is_animated": true, "bumper_title": "Warriorfolio v2.0.4 is here 🎉 Let's fly now! 🚀", "bumper_target": "_self"}, "type": "component.info-bumper"}, {"data": {"active": null}, "type": "hero"}, {"data": {"slug": "whats-new", "title": "What's new?", "subtitle": null, "is_active": true, "module_name": "whats-new", "tailwind_css_attributes": ["text-primary-500"]}, "type": "component.module"}, {"data": {"features": [{"icon": "sparkles", "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.\n"}, {"icon": "heart", "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python."}, {"icon": "logo-dribbble", "title": "New in v2.0.4", "description": "Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python."}], "is_active": true, "is_center": true}, "type": "component.feature-list"}, {"data": {"class": "py-1 md:py-2 lg:py-4"}, "type": "design.empty-separator"}, {"data": {"active": null}, "type": "courses"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "projects"}, {"data": {"active": null}, "type": "client"}, {"data": {"active": null}, "type": "newsletter"}, {"data": {"color": "blur"}, "type": "design.blur-beam"}, {"data": {"active": null}, "type": "contact"}, {"data": {"color": "pink"}, "type": "design.blur-beam"}]
