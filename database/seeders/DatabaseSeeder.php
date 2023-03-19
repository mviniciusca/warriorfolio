<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Link;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Timeline;
use App\Models\PagesSettings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            'name' => 'Nome do Usuário',
            'email' => 'mviniciusca@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('pages')->insert([
            'title'     => 'Homepage',
            'slug'      => '/',
            'layout'    => 'default',
            'blocks'    => '',
        ]);
        PagesSettings::factory()->count(1)->create();
        Timeline::factory()->count(1)->createMany([
            [
                'course' => 'Bachelor of Science in Computer Science',
                'university' => 'University of California, Los Angeles',
                'conclusion_date' => '2015-06-01',
            ],
            [
                'course' => 'Master of Science in Computer Science',
                'university' => 'University of California, Los Angeles',
                'conclusion_date' => '2017-06-01',
            ],
            [
                'course' => 'Doctor of Philosophy in Computer Science',
                'university' => 'University of California, Los Angeles',
                'conclusion_date' => '2020-06-01',
            ],
            [
                'course' => 'Postdoctoral Researcher',
                'university' => 'University of California, Los Angeles',
                'conclusion_date' => '2021-06-01',
            ],

        ]);
        Profile::factory()->count(1)->create();
        Link::factory()->count(1)->createMany([
            [
                'url' => '#contact',
                'title' => 'Contact',
                'order' => 4
            ],
            [
                'url' => '#about',
                'title' => 'About',
                'order' => 1
            ],
            [
                'url' => '#projects',
                'title' => 'Projects',
                'order' => 3
            ],
            [
                'url' => '#customers',
                'title' => 'Customers',
                'order' => 2
            ]
        ]);

    }
}
