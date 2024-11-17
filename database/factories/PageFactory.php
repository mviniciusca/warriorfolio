<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'      => 'Home',
            'slug'       => '/',
            'blocks'     => '[{"data": {"beam_background_active": null}, "type": "design.blur-background"}, {"data": {"active": null}, "type": "header"}, {"data": {"class": "py-3 md:py-6 lg:py-12"}, "type": "design.empty-separator"}, {"data": {"is_active": true, "is_center": true, "bumper_tag": "New", "bumper_icon": "", "bumper_link": null, "bumper_role": "primary", "is_animated": true, "bumper_title": "Warriorfolio v2.0.4 is here 🎉 Let\'s fly now! 🚀", "bumper_target": "_self"}, "type": "component.info-bumper"}]',
            'layout'     => 'default',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
