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
            'name'         => 'Warrior Mail',
            'phone'        => '999999-9999',
            'email'        => 'test@warriormail.dev',
            'subject'      => 'This is a just test',
            'body'         => 'This is just test message',
            'is_read'      => false,
            'is_important' => false,
            'created_at'   => now(),
        ];
    }
}
