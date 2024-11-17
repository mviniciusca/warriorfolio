<?php

namespace Database\Factories;

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
                'name' => 'Warriorfolio v2.0.4',
            ],

            'meta' => [
                'meta_title'       => 'Building the what\'s next with Laravel, Filament and Tailwind CSS.',
                'meta_author'      => 'Marcos Coelho',
                'meta_description' => 'Warriorfolio 2 is a free and open-source web application for creating and managing your own website.',
                'meta_keywords'    => 'warriorfolio, warriorfolio 2, warriorfolio cms, warriorfolio cms 2, warriorfolio 2 cms',
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
        return $this->afterCreating(function (\App\Models\Setting $setting) {
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
