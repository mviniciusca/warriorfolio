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
            'name' => 'Warriorfusion v2',
            'meta_title' => 'Building the what\'s next with Laravel, Filament and Tailwind CSS',
            'meta_author' => 'Marcos Coelho',
            'meta_description' => 'Warriorfusion is a free and open-source web application for creating and managing your own website.',
            'meta_keywords' => 'warriorfusion, warriorfusion 2, warriorfusion cms, warriorfusion cms 2, warriorfusion 2 cms',
        ];
    }

    /**
     *  Indicate that the model's module and layout should be created.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
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
