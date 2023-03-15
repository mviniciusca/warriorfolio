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
            'profile_title' => 'Marcos Coelho Profile',
            'about_me' => 'I am a software developer with a passion for aviation, with over 2 years of programming experience. I have specialized skills in languages such as PHP, Laravel, and Opencart. I graduated from Embraer and XP College as a Python developer, which gave me a broad knowledge base in different areas of programming. I specialize in backend development, where I have strong knowledge in software architecture, databases, and other important technologies for building robust and scalable applications. With my experience in various programming languages and full-stack development skills, I take pride in working on challenging and high-quality projects, offering creative solutions to complex problems and delivering reliable and high-performance results. Additionally, with my passion for aviation and training at Embraer, I am always seeking new opportunities to apply my technology skills in aviation-related projects and other related areas.',
            'github_link' => 'https://github.com/mviniciusca',
            'linkedin_link' => 'https://www.linkedin.com/in/marcosvca/',
            'twitter_link' => 'https://twitter.com/marcosvca_',
            'medium_link' => 'https://medium.com/@marcoscoelhodev',
            'profile_picture' => null,
        ];
    }
}
