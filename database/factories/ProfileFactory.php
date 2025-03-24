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
            'job_position' => 'Laravel Product Developer',
            'public_email' => 'warriorfolio@test.dev',
            'company'      => 'Warriorfolio Co.',
            'skills'       => 'PHP, Laravel, Filament, Tailwind, Livewire',
            'about'        => '
                                🚀 Welcome to Warriorfolio! Showcase Your Journey! <p></p>
                                Welcome to Warriorfolio—your personal space to share your journey, skills, and achievements. Whether you\'re a developer, designer, writer, or entrepreneur, this is where your story comes to life.<p></p>🔹 Bio <p></p>
                                Introduce yourself! Share a bit about your background, passions, and what drives you. Warriorfolio is the perfect place to express who you are and what you do.<p></p>
                                🎓 Courses & Education<p></p>
                                Showcase your learning journey! Add degrees, certifications, bootcamps, or online courses that have helped shape your expertise. Continuous learning is key to growth!
                                <p></p>
                                🛠️ Skills
                                <p></p>
                                Highlight the technologies, tools, and frameworks you excel in. Whether it\'s front-end development with HTML, CSS, and JavaScript, back-end expertise in Node.js and Python, or database management and API integrations—this is your space to shine.
                                <p></p>
                                Start building your Warriorfolio today and let the world see your journey!
                                <p></p>
                                — The Warriorfolio Team',
        ];
    }
}
