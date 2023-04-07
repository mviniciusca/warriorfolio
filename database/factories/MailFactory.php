<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mail>
 */
class MailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name,
            'email'         => $this->faker->unique()->safeEmail,
            'subject'       => $this->faker->sentence,
            'body'          => $this->faker->paragraph,
            'is_sent'       => $this->faker->boolean,
            'is_read'       => $this->faker->boolean,
            'is_starred'    => $this->faker->boolean,
            'is_trashed'    => $this->faker->boolean,
        ];
    }
}
