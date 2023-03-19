<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PagesSettings>
 */
class PagesSettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'about_title'               => 'About Me',
            'about_description'         => '', //
            'contact_title'             => 'Get in Touch',
            'contact_description'       => 'Feel free to contact me for any kind of work or suggestions below',
            'portfolio_title'           => 'Projects',
            'portfolio_description'     =>  "A portfolio section showcases an individual's or business's best work, providing a powerful marketing tool and building trust with potential clients or employers.",
            'customers_title'           => 'Customers',
            'customers_description'     => 'Customers are crucial to the success of any business, providing revenue, feedback, and support. By focusing on their needs, businesses can build loyalty and drive long-term success.',
        ];
    }
}
