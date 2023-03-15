<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PagesSettings>
 */
class PagesSettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'about_title'               => 'About Me',
            'about_description'         => '',
            'contact_title'             => 'Get in Touch',
            'contact_description'       => 'Feel free to contact me for any kind of work or suggestions below',
            'portfolio_title'           => 'From Paper to Vercel',
            'portfolio_description'     =>  'From paper to code: an overview of my work.',
            'customers_title'           => 'Trusted by',
            'customers_description'     => 'I have worked with a wide variety of clients, from small startups to large companies, each with their unique needs and objectives. Delivering customized projects that exceed client expectations.',
        ];
    }
}
