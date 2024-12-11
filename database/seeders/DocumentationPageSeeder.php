<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')
            ->insert([
                'title'  => 'Documentation',
                'slug'   => 'docs',
                'blocks' => json_encode([
                    [
                        'data' => ['color' => 'pink'],
                        'type' => 'design.blur-beam',
                    ],
                    [
                        'data' => ['vertical_space' => 'sm'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'image'             => 'public/img/core/demo/cpu.png',
                            'content'           => '<p>Olá, bem-vindo ao Warriorfolio.</p><p><br></p><p>Através desta Documentação Rápida, vou e guiar pelos primeiros passos que você deve tomar antes de iniciar sozinho sua jornada no Warriorfolio.</p>',
                            'heading'           => 'Fast <span class="tl">Documentation</span>',
                            'is_active'         => true,
                            'is_center'         => false,
                            'content_text_size' => 'text-base',
                            'heading_text_size' => 'text-4xl',
                        ],
                        'type' => 'component.heading-description',
                    ],
                    [
                        'data' => ['vertical_space' => 'xs'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => ['color' => 'blur'],
                        'type' => 'design.blur-beam',
                    ],
                    [
                        'data' => ['vertical_space' => 'xs'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'image'             => null,
                            'content'           => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque semper ullamcorper mauris ut scelerisque. Sed quis luctus velit, at hendrerit nulla. Sed tempor vulputate leo pellentesque lacinia.</p>',
                            'heading'           => 'App <span class="tl">Features</span> ',
                            'is_active'         => true,
                            'is_center'         => false,
                            'content_text_size' => 'text-base',
                            'heading_text_size' => 'text-3xl',
                        ],
                        'type' => 'component.heading-description',
                    ],
                    [
                        'data' => [
                            'features' => [
                                [
                                    'icon'          => 'document-outline',
                                    'link'          => null,
                                    'title'         => 'Pages',
                                    'description'   => 'You can create as many pages as you want and, following the concept of modularity, add pre-built components to them or create your own through components that combine with each other.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'hardware-chip-outline',
                                    'link'          => null,
                                    'title'         => 'Core Modules <span class="tag">updated</span>',
                                    'description'   => 'These are pre-build components that cannot be changed individually. This is designed to accelerate the development of new pages. Through these modules, you have access to several specific functionalities.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'flash-outline',
                                    'link'          => null,
                                    'title'         => 'Hero Section <span class="tag">new</span>',
                                    'description'   => 'Improved Hero Section, redesigned layout, more intuitive to use. It now comes with Sierra, a new interface with new presentation possibilities. Enchant your visitors from the first moment.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'heart-outline',
                                    'link'          => null,
                                    'title'         => 'New Sidebar <span class="tag">updated</span>',
                                    'description'   => 'Smarter Sidebar with main elements accessible for easy location. Don\'t waste your time looking for the number of unread messages, for example, just look at the badge on your sidebar.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'terminal-outline',
                                    'link'          => null,
                                    'title'         => 'Hackable <span class="tag">updated</span>',
                                    'description'   => 'Have total control of your application. Smart shortcuts, functions distributed throughout the system for you to customize the layout of your application as you wish. Use special CSS classes like "tl" for text effects or "tag" to create an animated tag.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'mail-outline',
                                    'link'          => null,
                                    'title'         => 'Messages <span class="tag">updated</span>',
                                    'description'   => 'Receive messages and in the future, write, through a modern Inbox with advanced filters. Received, sent, favorite messages in a single inbox, making your day-to-day easier.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'leaf-outline',
                                    'link'          => null,
                                    'title'         => 'Boost <span class="tag">updated</span>',
                                    'description'   => 'The layout of the entire system, both your Dashboard and the Website, have been redesigned. Incredible performance gain, with a huge evolution in Laravel Queries and also in System Architecture.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'rocket-outline',
                                    'link'          => null,
                                    'title'         => 'Portfolio Section',
                                    'description'   => 'Insert your recent projects, add tags, categories and display them to your visitors in a practical and fast way. Your work is displayed in a gallery of up to 12 components.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'telescope-outline',
                                    'link'          => null,
                                    'title'         => 'Activity Log',
                                    'description'   => 'Have control and view access activity, resource creation and more directly from your Control Panel. Stay up-to-date with your application from the home screen, allowing greater security and reliability on your website.',
                                    'is_new_window' => false,
                                ],
                            ],
                            'is_active' => true,
                            'is_center' => false,
                        ],
                        'type' => 'component.feature-list',
                    ],
                    [
                        'data' => ['color' => 'pink'],
                        'type' => 'design.blur-beam',
                    ],
                    [
                        'data' => ['vertical_space' => 'xs'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'image'             => null,
                            'content'           => '<p>Now that you know some of the main features and updates in this version of Warriorfolio, let\'s get our hands dirty, or rather, on the components. It is through them that you can create the layout of the pages as you wish.</p><p><br></p><p>The modules are separated into two categories: Components and Core Modules. Components are individual blocks and actions are saved only on the pages that are created. Core Modules are components that have already been developed and cannot be changed in their structure, that is, their behavior is the same.</p><p><br></p><p>The Core Modules in this version 2.0.4 of Warriorfolio are: Header, Hero Section, Projects Section, Profile Section, Mailing List Module, Contact Section and Footer. Let\'s get to know each of them and their use.</p>',
                            'heading'           => 'Getting <span class="tl">Started</span> ',
                            'is_active'         => true,
                            'is_center'         => false,
                            'content_text_size' => 'text-base',
                            'heading_text_size' => 'text-3xl',
                        ],
                        'type' => 'component.heading-description',
                    ],
                    [
                        'data' => [
                            'features' => [
                                [
                                    'icon'          => 'menu-outline',
                                    'link'          => null,
                                    'title'         => 'Header',
                                    'description'   => 'The Header is responsible for the entire top of your application. Where the logo, the navigation menu and the dark/white mode system are located. It was created as a Core Module, as it is an element that is repeated across pages.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'flash-outline',
                                    'link'          => null,
                                    'title'         => 'Hero Section',
                                    'description'   => 'The Hero Section is used as a main highlight of your website. Use it as a presentation of the product you are developing or even about yourself.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'images-outline',
                                    'link'          => null,
                                    'title'         => 'Projects Section',
                                    'description'   => 'The Project Section is the gallery of your Portfolio. This section functions as a professional showcase that visually and concretely demonstrates your experience, technical knowledge and ability to create solutions, being one of the most important parts of your portfolio to impress recruiters and potential clients.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'person-outline',
                                    'link'          => null,
                                    'title'         => 'Profile Section',
                                    'description'   => 'This section is composed of three elements: a profile with your name, photo and your skills. In the second part, an area for a brief summary of your biography and the third part is your professional courses.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'mail-open-outline',
                                    'link'          => null,
                                    'title'         => 'Mailing List Module',
                                    'description'   => 'Module responsible for capturing emails for your Mailing List. You can export this data through the CSV format and use it in other message sending services.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'chatbubbles-outline',
                                    'link'          => null,
                                    'title'         => 'Contact Section',
                                    'description'   => 'In this module, you have a message form, where visitors to your website can contact you. Messages are delivered directly to your Inbox. Also, there is a space for public information such as address, telephone and geolocation through Google Maps.',
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'grid-outline',
                                    'link'          => null,
                                    'title'         => 'Footer Section',
                                    'description'   => 'The final part of your website. The footer has your application\'s logo and your social networks.',
                                    'is_new_window' => false,
                                ],
                            ],
                            'is_active' => true,
                            'is_center' => false,
                        ],
                        'type' => 'component.feature-list',
                    ],
                    [
                        'data' => ['color' => 'pink'],
                        'type' => 'design.blur-beam',
                    ],
                    [
                        'data' => ['vertical_space' => 'xs'],
                        'type' => 'design.empty-separator',
                    ],
                    [
                        'data' => [
                            'image'             => null,
                            'content'           => '<p>&nbsp;To learn more about this Documentation, please visit the<span style="text-decoration: underline;"> </span><a href="https://github.com/mviniciusca/warriorfolio"><span style="text-decoration: underline;">Github</span></a> and the official website of the <a href="https://warriorfolio.vercel.app"><span style="text-decoration: underline;">Documentation on Vercel.</span></a>&nbsp;</p>',
                            'heading'           => 'Read <span class="tl">More</span>',
                            'is_active'         => true,
                            'is_center'         => false,
                            'content_text_size' => 'text-base',
                            'heading_text_size' => 'sm:text-lg md:text-xl lg:text-3xl',
                        ],
                        'type' => 'component.heading-description',
                    ],
                ]), // end
                'layout'     => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
