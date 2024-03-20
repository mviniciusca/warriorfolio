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
            'dribbble' => 'www.dribbble.com/#',
            'github' => 'www.github.com/#',
            'linkedin' => 'www.linkedin.com/in/#',
            'twitter' => 'www.twitter.com/#',
            'facebook' => 'www.facebook.com/#',
            'devto' => 'www.dev.to/#',
            'instagram' => 'www.instagram.com/#',
            'youtube' => 'www.youtube.com/#',
            'medium' => 'www.medium.com/#',
            'twitch' => 'www.twitch.com/#',
            'skills' => 'PHP, Laravel, Filament, Tailwind, Livewire, Python',
            'about' => '<p>Enthusiastic full-stack developer with a robust skill set encompassing front-end technologies such as HTML, CSS, and JavaScript, coupled with proficiency in back-end languages like Node.js and Python.</p><p>Experienced in designing and implementing database structures, API integrations, and responsive user interfaces.</p><br><p>Committed to writing clean, modular code, I bring a detail-oriented approach to development projects.</p><br><p>Versatile in utilizing frameworks like React and Express, I am equally adept at crafting scalable, efficient solutions on both ends of the tech stack.</p><br><p>With a keen eye for user experience and a passion for staying abreast of industry trends, I thrive in collaborative environments that encourage innovation. Ready to leverage my expertise to create impactful, high-performance applications and contribute to cutting-edge projects in a dynamic team setting.</p>
'
        ];
    }
}
