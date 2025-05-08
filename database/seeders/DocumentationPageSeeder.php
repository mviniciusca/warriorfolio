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
                'created_at' => now(),
                'title'      => 'Documentation',
                'slug'       => 'docs',
                'blocks'     => json_encode([
                    [
                        'type' => 'component.heading-description',
                        'data' => [
                            'heading'                  => 'Fast Documentation',
                            'content'                  => 'Welcome to Warriorfolio! 🚀 <p></p> This documentation will get you up and running quickly with the essential features and functionality of our application. Whether you\'re a new user or just need a refresher, this guide provides everything you need to start using Warriorfolio effectively right away.</p><p>In the following sections, you\'ll find step-by-step instructions for installation, account setup, core features, and troubleshooting. Let\'s get started!</p><p>This entire page was created with Warriorfolio components.</p><p>',
                            'is_active'                => true,
                            'is_center'                => false,
                            'is_filled'                => false,
                            'module_id'                => 'documentation',
                            'is_featured_image_active' => true,
                        ],
                    ],
                    [
                        'type' => 'component.feature-list',
                        'data' => [
                            'module_title'               => 'Quick Start',
                            'module_subtitle'            => null,
                            'columns'                    => '2',
                            'is_active'                  => true,
                            'is_center'                  => false,
                            'is_filled'                  => false,
                            'is_animated'                => false,
                            'is_light_fx'                => true,
                            'is_color_icon'              => false,
                            'is_card_filled'             => true,
                            'is_content_center'          => false,
                            'is_heading_active'          => false,
                            'is_filled_inverted'         => false,
                            'is_section_filled_inverted' => false,
                            'is_border'                  => true,
                            'with_padding'               => false,
                            'features'                   => [
                                [
                                    'icon'          => 'lock-open-outline',
                                    'title'         => 'Your Admin Area',
                                    'description'   => 'Access your Admin Area to manage your website. You can create new pages, edit your profile, manage your projects and much more.',
                                    'link'          => '/admin',
                                    'is_new_window' => true,
                                ],
                                [
                                    'icon'          => 'flashlight-outline',
                                    'title'         => 'Laravel + Filament',
                                    'description'   => 'Warriorfolio is built on Laravel and Filament. This powerful combination provides a solid foundation for your website, with a modern and intuitive interface.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'component.feature-list',
                        'data' => [
                            'module_title'               => 'Features',
                            'module_subtitle'            => 'Discover the features of Warriorfolio. v2.2.0',
                            'columns'                    => '4',
                            'is_active'                  => true,
                            'is_center'                  => false,
                            'is_filled'                  => true,
                            'is_animated'                => false,
                            'is_light_fx'                => false,
                            'is_color_icon'              => false,
                            'is_card_filled'             => true,
                            'is_content_center'          => false,
                            'is_heading_active'          => true,
                            'is_filled_inverted'         => false,
                            'is_section_filled_inverted' => false,
                            'is_border'                  => true,
                            'with_padding'               => true,
                            'features'                   => [
                                [
                                    'icon'          => 'rocket-outline',
                                    'title'         => 'Juno Theme <span class="tag">new</span>',
                                    'description'   => 'The very first theme of Warriorfolio. Juno is a minimalist-modern and elegant theme that allows you to create a professional website quickly and easily.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'logo-github',
                                    'title'         => 'Github Module <span class="tag">new</span>',
                                    'description'   => 'The Github module allows you to display your Github repositories on your website. You can choose which repositories to display and how they will be displayed.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'color-wand-outline',
                                    'title'         => 'QuickAccess <span class="tag">new</span>',
                                    'description'   => 'QuickAccess is a new feature that allows you to access your Dashboard from anywhere in your website. Use it to quickly navigate to your projects, messages and settings.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'planet-outline',
                                    'title'         => 'Saturn UI  <span class="tag">updated</span> ',
                                    'description'   => 'Saturn UI is a new interface for Warriorfolio. It is a modern and intuitive interface that allows you to manage your website and projects easily.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'chatbox-outline',
                                    'title'         => 'Notes (Blog) <span class="tag">updated</span>',
                                    'description'   => 'Write notes and let your ideas flow. Now, Warriorfolio has a blog ready for you to express yourself. It also features Core Modules, just like any other component of Warriorfolio.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'logo-whatsapp',
                                    'title'         => 'Whatsapp Web Chatbox',
                                    'description'   => 'You can display a whatsapp web button on your website. This feature is hidden and can be activated in the settings.Works on mobile and desktop.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'document-outline',
                                    'title'         => 'Pages <span class="tag">updated</span>',
                                    'description'   => 'You can create as many pages as you want and, following the concept of modularity, add pre-built components to them or create your own through components that combine with each other.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'rocket-outline',
                                    'title'         => 'Portfolio Showcase <span class="tag">updated</span>',
                                    'description'   => 'Insert your recent projects, add tags, categories and display them to your visitors in a practical and fast way. Your work is displayed in a gallery of up to 12 components.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'albums-outline',
                                    'title'         => 'Sliders',
                                    'description'   => 'Create sliders with images, videos and text. You can use them in your projects, in the Hero Section or in any other part of your website. The sliders are fully customizable.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'hardware-chip-outline',
                                    'title'         => 'Core Modules <span class="tag">updated</span>',
                                    'description'   => 'These are pre-build components that cannot be changed individually. This is designed to accelerate the development of new pages. Through these modules, you have access to several specific functionalities.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'flash-outline',
                                    'title'         => 'Hero Section <span class="tag">updated</span>',
                                    'description'   => 'Improved Hero Section, redesigned layout, more intuitive to use. It now comes with Sierra, a new interface with new presentation possibilities. Enchant your visitors from the first moment.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon' => 'heart-outline',
                                    'title'
                                                    => 'Sidebar',
                                    'description'   => 'Smarter Sidebar with main elements accessible for easy location. Don\'t waste your time looking for the number of unread messages, for example, just look at the badge on your sidebar.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'terminal-outline',
                                    'title'         => 'Hackable Fields',
                                    'description'   => 'Have total control of your application. Smart shortcuts, functions distributed throughout the system for you to customize the layout of your application as you wish. Use special CSS classes like "tl" for text effects or "tag" to create an animated tag.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'mail-outline',
                                    'title'         => 'Messages',
                                    'description'   => 'Receive messages and in the future, write, through a modern Inbox with advanced filters. Received, sent, favorite messages in a single inbox, making your day-to-day easier.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'leaf-outline',
                                    'title'         => 'Boost',
                                    'description'   => 'The layout of the entire system, both your Dashboard and the Website, have been redesigned. Incredible performance gain, with a huge evolution in Laravel Queries and also in System Architecture.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'telescope-outline',
                                    'title'         => 'Activity Log',
                                    'description'   => 'Have control and view access activity, resource creation and more directly from your Control Panel. Stay up-to-date with your application from the home screen, allowing greater security and reliability on your website.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'component.feature-list',
                        'data' => [
                            'module_title'               => 'Core Components',
                            'module_subtitle'            => 'Now that you know some of the main features and updates in this version of Warriorfolio, let\'s get our hands dirty, or rather, on the components.',
                            'columns'                    => '4',
                            'is_active'                  => true,
                            'is_center'                  => false,
                            'is_filled'                  => false,
                            'is_animated'                => false,
                            'is_light_fx'                => false,
                            'is_color_icon'              => false,
                            'is_card_filled'             => true,
                            'is_content_center'          => false,
                            'is_heading_active'          => true,
                            'is_filled_inverted'         => false,
                            'is_section_filled_inverted' => false,
                            'is_border'                  => true,
                            'with_padding'               => true,
                            'features'                   => [
                                [
                                    'icon'          => 'pencil-outline',
                                    'title'         => 'Notes',
                                    'description'   => 'The Notes module is a blog where you can write articles, tutorials, news and more. It is a powerful tool for content creation and sharing. In version 2.1.3, the Notes module has been updated with new features and improvements.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'menu-outline',
                                    'title'         => 'Header',
                                    'description'   => 'The Header is responsible for the entire top of your application. Where the logo, the navigation menu and the dark/white mode system are located. It was created as a Core Module, as it is an element that is repeated across pages.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'flash-outline',
                                    'title'         => 'Hero Section',
                                    'description'   => 'The Hero Section is used as a main highlight of your website. Use it as a presentation of the product you are developing or even about yourself.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'images-outline',
                                    'title'         => 'Projects Section',
                                    'description'   => 'The Project Section is the gallery of your Portfolio. This section functions as a professional showcase that visually and concretely demonstrates your experience, technical knowledge and ability to create solutions, being one of the most important parts of your portfolio to impress recruiters and potential clients.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'        => 'person-outline',
                                    'title'       => 'Profile Section',
                                    'description' => 'This section is composed of three elements: a profile with your name, photo and
                                    your skills. In the second part, an area for a brief summary of your biography and the third part is your professional courses.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'mail-open-outline',
                                    'title'         => 'Mailing List Module',
                                    'description'   => 'Module responsible for capturing emails for your Mailing List. You can export this data through the CSV format and use it in other message sending services.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'chatbubbles-outline',
                                    'title'         => 'Contact Section',
                                    'description'   => 'In this module, you have a message form, where visitors to your website can contact you. Messages are delivered directly to your Inbox. Also, there is a space for public information such as address, telephone and geolocation through Google Maps.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                                [
                                    'icon'          => 'grid-outline',
                                    'title'         => 'Footer Section',
                                    'description'   => 'The final part of your website. The footer has your application\'s logo and your social networks.',
                                    'link'          => null,
                                    'is_new_window' => false,
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'component.feature-list',
                        'data' => [
                            'module_title'               => 'More Information',
                            'module_subtitle'            => 'Stay connected with Warriorfolio',
                            'columns'                    => 3,
                            'is_active'                  => true,
                            'is_center'                  => false,
                            'is_filled'                  => false,
                            'is_animated'                => false,
                            'is_light_fx'                => true,
                            'is_color_icon'              => false,
                            'is_card_filled'             => true,
                            'is_content_center'          => false,
                            'is_heading_active'          => true,
                            'is_filled_inverted'         => false,
                            'is_section_filled_inverted' => false,
                            'is_border'                  => true,
                            'with_padding'               => true,
                            'features'                   => [
                                [
                                    'icon'          => 'logo-vercel',
                                    'title'         => 'Official Documentation',
                                    'description'   => 'The official documentation on Vercel.',
                                    'link'          => 'https://warriorfolio.vercel.app',
                                    'is_new_window' => true,
                                ],
                                [
                                    'icon'          => 'logo-github',
                                    'title'         => 'Github Repository',
                                    'description'   => 'Get the latest updates on Github ',
                                    'link'          => 'https://github.com/mviniciusca/warriorfolio',
                                    'is_new_window' => true,
                                ],
                                [
                                    'icon'          => 'logo-laravel',
                                    'title'         => 'Laravel Community ',
                                    'description'   => 'Get the latest updates on Github ',
                                    'link'          => 'https://laravel.com',
                                    'is_new_window' => true,
                                ],
                            ],
                        ],
                    ],
                ]),
            ]);
    }
}
