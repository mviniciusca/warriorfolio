<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'application' => [
                'name' => 'Warriorfolio v'.env('APP_VERSION'),
            ],
            'config' => [
                'empty_section' => true,
            ],
            'blog' => [
                'logo'                    => null,
                'name'                    => 'Warriorfolio<br/><span class="dg">Notes</span>',
                'button'                  => 'View All',
                'is_active'               => true,
                'button_url'              => '/blog',
                'description'             => 'Free your mind with Notes.',
                'header_title'            => 'From Notes ...',
                'is_invert_logo'          => false,
                'is_logo_active'          => true,
                'header_subtitle'         => 'Latest posts from Notes',
                'is_share_active'         => true,
                'is_show_profile'         => true,
                'module_is_active'        => true,
                'is_heading_visible'      => true,
                'more_articles_title'     => null,
                'is_trend_widget_active'  => true,
                'more_articles_btn_title' => null,
            ],
            //
            'meta' => [
                'meta_title'       => 'Building the what\'s next with Laravel, Filament and Tailwind CSS.',
                'meta_author'      => 'Marcos Coelho',
                'meta_description' => 'Warriorfolio is a free and open-source web application for creating and managing your own portfolio website.',
                'meta_keywords'    => 'warriorfolio, warriorfolio cms, open source cms, quick portfolio website',
            ],
            //
            'design' => [
                'animation'                   => false,
                'line_beam_is_active'         => false,
                'darkmode_is_active'          => true,
                'background_image_visibility' => false,
                'background_image_position'   => 'bg-center',
                'background_image_size'       => 'bg-auto',
                'background_image_repeat'     => 'bg-no-repeat',

            ],
        ];
    }

    /**
     *  Indicate that the model's module and layout should be created.
     *
     * @return Factory
     */
    public function configure()
    {
        return $this->afterCreating(function (Setting $setting) {
            $setting->module()->create([
                'setting_id' => $setting->id,
            ]);
            $setting->chatbox()->create([
                'setting_id' => $setting->id,
            ]);
            $setting->maintenance()->create([
                'setting_id' => $setting->id,
            ]);
            $setting->core()->create([
                'setting_id' => $setting->id,
            ]);
        });
    }
}
