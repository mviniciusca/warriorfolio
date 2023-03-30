<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => 'Warriorfolio',
            'about'         => "Warriorfolio is a cutting-edge landing page system designed to help users create professional portfolios online. Built on the Laravel framework, this powerful platform is the ideal solution for anyone looking to showcase their skills and talents in a compelling and visually stunning way. <p></p><br>
            With Warriorfolio, users can easily create and customize their portfolios to suit their individual needs and goals. The system comes equipped with a range of customizable templates and themes, allowing users to create a unique and personalized online presence.<p></p><br> One of the key features of Warriorfolio is its intuitive drag-and-drop interface, which makes it easy for users to add and organize their content. Whether it's text, images, or videos, users can quickly and easily create a dynamic and engaging portfolio that showcases their work and accomplishments.
            With a focus on user experience and seamless functionality, Warriorfolio is the perfect tool for anyone looking to take their online presence to the next level.<p></p><br>
            So why wait? Sign up today and start creating your own stunning portfolio with Warriorfolio.",
            'github_link'       => 'https://github.com/',
            'linkedin_link'     => 'https://www.linkedin.com/',
            'twitter_link'      => 'https://twitter.com/',
            'dribbble_link'     => 'https://dribbble.com/',
            'localization'      => 'Rio de Janeiro, Brazil',
            'job_position'      => 'Fullstack Developer',
            'picture'           => null,
            'skills'            => 'PHP, Laravel, Livewire, AlpineJs, Tailwind, Filament'
        ];
    }
}
