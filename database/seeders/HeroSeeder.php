<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpar dados existentes
        Hero::truncate();

        // Criar Hero Section principal
        Hero::create([
            'is_active' => true,
            'title'     => 'Hero Principal - Warriorfolio',
            'content'   => [
                // Configurações gerais
                'theme'                           => 'sierra',
                'is_filled'                       => false,
                'social_network_module_is_active' => true,
                'is_mailing_active'               => true,

                // Títulos
                'section_title'    => 'Bem-vindo ao <span class="tl">Warriorfolio</span>',
                'section_subtitle' => 'Construa seu portfólio profissional de forma simples e <span class="dg">elegante</span>',

                // Botões de ação
                'buttons' => [
                    [
                        'button_title'  => 'Começar Agora',
                        'button_url'    => '/admin',
                        'button_style'  => 'primary',
                        'button_target' => '_self',
                        'icon'          => 'rocket-outline',
                        'icon_before'   => true,
                    ],
                    [
                        'button_title'  => 'Ver Projetos',
                        'button_url'    => '#portfolio',
                        'button_style'  => 'outlined',
                        'button_target' => '_self',
                        'icon'          => 'briefcase-outline',
                        'icon_before'   => true,
                    ],
                ],

                // Info Bumper
                'bumper_is_active'   => true,
                'bumper_is_animated' => true,
                'bumper_is_center'   => false,
                'bumper_tag'         => 'Novo',
                'bumper_title'       => '🚀 Versão 2.2 disponível!',
                'bumper_icon'        => 'sparkles-outline',
                'bumper_link'        => '#',
                'bumper_target'      => '_self',
                'bumper_role'        => 'primary',

                // Imagem em destaque
                'featured_image_is_active' => true,
                'browser_border_is_active' => true,
                'browser_border_device'    => 'browser',
                'browser_border_url'       => 'https://example.com',

                // Imagem de fundo
                'is_active'         => false,
                'is_upper'          => false,
                'is_highlight'      => false,
                'bg_position'       => 'bg-center',
                'bg_size'           => 'bg-cover',
                'bg_repeat'         => 'bg-no-repeat',
                'is_bg_grayscale'   => false,
                'is_bg_blur'        => false,
                'is_overlay_active' => false,
                'bg_overlay'        => 'hero-bg-overlay-default',

                // Padrão de fundo
                'is_pattern_bg' => false,
                'pattern_name'  => 'cross',

                // Slider estático
                'slider_is_active'  => true,
                'is_invert'         => true,
                'is_marquee'        => false,
                'marquee_speed'     => 'normal',
                'marquee_direction' => 'left',
                'slider_content'    => [
                    [
                        'slider_title'  => 'Laravel',
                        'slider_link'   => 'https://laravel.com',
                        'is_new_window' => true,
                        'caption'       => 'Framework PHP',
                    ],
                    [
                        'slider_title'  => 'Filament',
                        'slider_link'   => 'https://filamentphp.com',
                        'is_new_window' => true,
                        'caption'       => 'Admin Panel',
                    ],
                    [
                        'slider_title'  => 'TailwindCSS',
                        'slider_link'   => 'https://tailwindcss.com',
                        'is_new_window' => true,
                        'caption'       => 'CSS Framework',
                    ],
                    [
                        'slider_title'  => 'Alpine.js',
                        'slider_link'   => 'https://alpinejs.dev',
                        'is_new_window' => true,
                        'caption'       => 'JavaScript Framework',
                    ],
                ],
            ],
        ]);

        // Criar Hero Section alternativo
        Hero::create([
            'is_active' => false,
            'title'     => 'Hero Alternativo - Portfólio Criativo',
            'content'   => [
                // Configurações gerais
                'theme'                           => 'default',
                'is_filled'                       => true,
                'social_network_module_is_active' => false,
                'is_mailing_active'               => false,

                // Títulos
                'section_title'    => 'Desenvolvedor <span class="tl">Full Stack</span>',
                'section_subtitle' => 'Transformando ideias em <span class="dg">soluções digitais</span> inovadoras',

                // Botões de ação
                'buttons' => [
                    [
                        'button_title'  => 'Meus Projetos',
                        'button_url'    => '#projects',
                        'button_style'  => 'primary',
                        'button_target' => '_self',
                        'icon'          => 'code-slash-outline',
                        'icon_before'   => true,
                    ],
                    [
                        'button_title'  => 'Entrar em Contato',
                        'button_url'    => '#contact',
                        'button_style'  => 'secondary',
                        'button_target' => '_self',
                        'icon'          => 'mail-outline',
                        'icon_before'   => true,
                    ],
                ],

                // Info Bumper
                'bumper_is_active'   => true,
                'bumper_is_animated' => false,
                'bumper_is_center'   => true,
                'bumper_tag'         => 'Disponível',
                'bumper_title'       => '💼 Aberto para novos projetos',
                'bumper_icon'        => 'briefcase-outline',
                'bumper_link'        => '#contact',
                'bumper_target'      => '_self',
                'bumper_role'        => 'info',

                // Imagem em destaque
                'featured_image_is_active' => true,
                'browser_border_is_active' => false,
                'browser_border_device'    => 'mobile',

                // Imagem de fundo
                'is_active'         => true,
                'is_upper'          => true,
                'is_highlight'      => true,
                'bg_position'       => 'bg-center',
                'bg_size'           => 'bg-cover',
                'bg_repeat'         => 'bg-no-repeat',
                'is_bg_grayscale'   => false,
                'is_bg_blur'        => true,
                'is_overlay_active' => true,
                'bg_overlay'        => 'hero-bg-overlay-middle',

                // Padrão de fundo
                'is_pattern_bg' => false,
                'pattern_name'  => 'dot',

                // Slider estático
                'slider_is_active'  => true,
                'is_invert'         => false,
                'is_marquee'        => true,
                'marquee_speed'     => 'slow',
                'marquee_direction' => 'right',
                'slider_content'    => [
                    [
                        'slider_title' => 'PHP',
                        'caption'      => 'Backend Development',
                    ],
                    [
                        'slider_title' => 'JavaScript',
                        'caption'      => 'Frontend Development',
                    ],
                    [
                        'slider_title' => 'React',
                        'caption'      => 'UI Library',
                    ],
                    [
                        'slider_title' => 'Vue.js',
                        'caption'      => 'Progressive Framework',
                    ],
                    [
                        'slider_title' => 'Node.js',
                        'caption'      => 'Runtime Environment',
                    ],
                ],
            ],
        ]);

        // Criar Hero Section minimalista
        Hero::create([
            'is_active' => false,
            'title'     => 'Hero Minimalista - Designer',
            'content'   => [
                // Configurações gerais
                'theme'                           => 'default',
                'is_filled'                       => false,
                'social_network_module_is_active' => true,
                'is_mailing_active'               => false,

                // Títulos
                'section_title'    => 'Design <span class="tl">Simples</span>, Impacto <span class="dg">Máximo</span>',
                'section_subtitle' => 'Criando experiências digitais memoráveis',

                // Botões de ação
                'buttons' => [
                    [
                        'button_title'  => 'Ver Portfolio',
                        'button_url'    => '#portfolio',
                        'button_style'  => 'ghost',
                        'button_target' => '_self',
                        'icon'          => 'eye-outline',
                        'icon_before'   => false,
                    ],
                ],

                // Info Bumper
                'bumper_is_active' => false,

                // Imagem em destaque
                'featured_image_is_active' => false,

                // Imagem de fundo
                'is_active' => false,

                // Padrão de fundo
                'is_pattern_bg' => true,
                'pattern_name'  => 'dot',

                // Slider estático
                'slider_is_active' => false,
            ],
        ]);
    }
}
