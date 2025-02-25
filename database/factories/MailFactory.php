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
            'name'    => 'Warrior Mail',
            'phone'   => '999999-9999',
            'email'   => 'test@warriormail.dev',
            'subject' => 'Welcome to Warriorfolio 2 🎉',
            'body'    => 'We\'re excited to have you onboard! 🎉

This is a test email from Warriroflio, making sure everything is working smoothly.

✅ What\'s new?

Your personal blog is ready! 📝
Dark mode is now the default. 🌙✨
Improved performance and smoother experience. ⚡
Customizable background images across the app! 🌍
Start exploring and let us know what you think! If you have any questions, we\'re here to help.

Happy exploring! 🚀

— Marcos Coelho',
            'is_read'      => false,
            'is_important' => false,
            'created_at'   => now(),
        ];
    }
}
