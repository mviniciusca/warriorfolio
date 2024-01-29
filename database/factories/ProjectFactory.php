<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Warriorfolio v2',
            'slug' => 'warriorfolio-v2-demo-post',
            'short_description' => 'Warriorfolio is a free, open source, cms for creating and managing your portfolio website.',
            'content' => 'Warriorfolio aims to be simple, fast and effective in creating a Landing Page for your portfolio. It arrives in its new version, more robust, smarter, flexible and with new intuitive features. With the modular concept in mind, you can very easily choose the order in which your page will be assembled and displayed to the public.
            <p></p>
            Designed to be 100% managed by the Control Panel, without the need for in-depth technical knowledge in programming, PHP or even Laravel.
            <p></p>
            This is a PHP application that has Laravel and Filament in its Core. Filament is a set of tools that allows you to create a control panel or content manager for Laravel. Created by Dan Harrin, Zep Fietje and the entire PHP community. Filament is constantly evolving and is a highly tested, safe, robust, scalable product with complete and easy-to-understand documentation.
            <p></p>
            Filament is powered by Livewire technology, which is a framework for Laravel that allows the creation of applications in real time, without the need for in-depth knowledge of JavaScript. Livewire is a product of Caleb Porzio, creator of AlpineJs.
            <p></p>
            Warriorfolio 2 is also under the umbrella of one of the biggest frameworks in the world, Laravel. Created by Taylor Otwell, Laravel is a robust, secure, scalable framework with complete and easy-to-understand documentation. Laravel is a framework that is constantly evolving and is a highly tested product with an active and engaged community.',
            'image_cover' => 'img/core/project-cover-demo.png',
            'external_link' => 'https://github.com/mviniciusca/warriorfolio',
        ];
    }
}
