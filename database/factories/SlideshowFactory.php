<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slideshow>
 */
class SlideshowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Hero Section',
            'module_name' => 'hero-section',
            'is_active' => true,
            'show_title' => false,
            // content is a json column type
            'content' => [
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6K6BD07BDCRD4DPDZ4F81P.png",
                    "image_title" => null
                ],
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6KPG330S4WFGWPFS5FYY58.png",
                    "image_title" => null
                ],
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6KPG343Z50GSJAA1VGJAKD.png",
                    "image_title" => null
                ],
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6KPG350CEG50CZ5Z7HWNNY.png",
                    "image_title" => null
                ],
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6KPG350CEG50CZ5Z7HWNNZ.png",
                    "image_title" => null
                ],
                [
                    "image_alt" => null,
                    "image_url" => null,
                    "image_path" => "slideshow/01HJ6KPG350CEG50CZ5Z7HWNP0.png",
                    "image_title" => null
                ]
            ]

        ];
    }
}
