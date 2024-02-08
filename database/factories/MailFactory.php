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
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'subject' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'is_read' => $this->faker->boolean,
            'is_important' => $this->faker->boolean,
            'created_at' => $this->faker->dateTimeThisYear('+ 11 months'),
        ];
    }
}
