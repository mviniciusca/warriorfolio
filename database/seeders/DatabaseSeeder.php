<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hero\Welcome;
use App\Models\Link;
use App\Models\Profile;
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

        /** Create a new user on database */
       DB::table('users')->insert([
            'name'      => 'Warriorfolio',
            'email'     => 'warriorfolio@test.dev',
            'password'  => Hash::make('admin'),
        ]);

        /** Create a new page on filament database */
        DB::table('pages')->insert([
            'slug'      => '/',
            'title'     => 'Homepage',
            'blocks'    => '',
            'layout'    => 'default',
        ]);

        /** Add main page settings on database */
        PagesSettings::factory()->count(1)->create();

        /** Add main profile info on database */
        Profile::factory()->count(1)->create();

        /** Add main courses in the timeline feed on database */
        Timeline::factory()->count(1)->createMany([
            [
                'course'            => 'Bachelor of Science in Computer Science',
                'university'        => 'University of California, Los Angeles',
                'conclusion_date'   => '2015-06-01',
            ],
            [
                'course'            => 'Master of Science in Computer Science',
                'university'        => 'University of California, Los Angeles',
                'conclusion_date'   => '2017-06-01',
            ],
            [
                'course'            => 'Doctor of Philosophy in Computer Science',
                'university'        => 'University of California, Los Angeles',
                'conclusion_date'   => '2020-06-01',
            ],
            [
                'course'            => 'Postdoctoral Researcher',
                'university'        => 'University of California, Los Angeles',
                'conclusion_date'   => '2021-06-01',
            ],

        ]);

        /** Add main navigation links on database */
        Link::factory()->count(1)->createMany([
            [
                'url'   => '#about',
                'title' => 'About',
                'order' => 1
            ],
            [
                'url'   => '#portfolio',
                'title' => 'Projects',
                'order' => 2
            ],
            [
                'url'   => '#customers',
                'title' => 'Customers',
                'order' => 3
            ],
            [
                'url'   => '#contact',
                'title' => 'Contact',
                'order' => 4
            ]
        ]);

        /** Create a Welcome Text */
        Welcome::factory()->count(1)->create();
    }
}
