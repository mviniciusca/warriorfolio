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
            'localization' => 'Rio de Janeiro, Brazil',
            'job_position' => 'Full Stack Developer',
            'dribbble' => 'www.dribbble.com/warriorfolio',
            'github' => 'www.github.com/warriorfolio',
            'linkedin' => 'www.linkedin.com/in/warriorfolio',
            'twitter' => 'www.twitter.com/warriorfolio',
            'facebook' => 'www.facebook.com/warriorfolio',
            'instagram' => 'www.instagram.com/warriorfolio',
            'youtube' => 'www.youtube.com/warriorfolio',
            'twitch' => 'www.twitch.com/warriorfolio',
            'skills' => 'PHP, Laravel, Filament, Tailwind, Livewire, Python',
            'about' => 'Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python. Experienced in designing and implementing database structures, API integrations, and responsive user interfaces.
            <br />
            Committed to writing clean, modular code, I bring a detail-oriented approach to development projects. Versatile in utilizing frameworks like React and Express, I am equally adept at crafting scalable, efficient solutions on both ends of the tech stack. With a keen eye for user experience and a passion for staying abreast of industry trends, I thrive in collaborative environments that encourage innovation.
            <br />
            Ready to leverage my expertise to create impactful, high-performance applications and contribute to cutting-edge projects in a dynamic team setting.'
        ];
    }
}
