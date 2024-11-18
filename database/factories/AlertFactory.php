<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AlertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_dismissible' => true,
            'is_active'      => true,
            'title'          => 'example-alert',
            'style'          => 'toast',
            'button_text'    => 'Agree',
            'message'        => 'This is an alert example! You can use for some important message!',
        ];
    }
}
