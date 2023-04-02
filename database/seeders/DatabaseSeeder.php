<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Link;
use App\Models\Mail;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Timeline;
use App\Models\Project\Tag;
use App\Models\Hero\Welcome;
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

        //create tags

        Tag::factory()->count(1)->createMany([

            [
                'title' => 'Laravel',
                'slug' => 'laravel',
                'color' => '#EF4444', // equals to red-500
                'icon' => '<path d="M505.57 234.62c-3.28-3.53-26.82-32.29-39.51-47.79-6.75-8.24-12.08-14.75-14.32-17.45l-.18-.22-.2-.21c-5.22-5.83-12.64-12.51-23.78-12.51a39.78 39.78 0 00-5.41.44c-.37.05-.75.11-1.15.15-2.45.27-10.06 1.5-28.14 4.48-14 2.29-35.11 5.77-38.31 6.07l-.71.06-.69.13c-10 1.78-16.62 6.22-19.56 13.19-1.55 3.68-3.22 11.15 2.94 19.86 1.53 2.22 6.83 9.56 15.94 22.17 6.06 8.4 12.87 17.82 18.75 26L259.9 275 150.66 96.05l-.2-.34-.23-.33-.44-.65C145.32 88.17 139.76 80 123.7 80c-1.13 0-2.31 0-3.63.11-4.6.25-21.42 1.57-40.89 3.11-21.49 1.69-50.9 4-54.72 4.1h-.73l-.79.08c-9.14.89-15.77 4.6-19.7 11-6.55 10.69-1.42 22.69.26 26.63C6.87 133 37.56 197.7 64.63 254.81c18 37.94 36.58 77.17 38.1 80.65a34.85 34.85 0 0032.94 21.59 46.62 46.62 0 009.86-1.1h.21l.2-.05c13.86-3.38 57.83-14.54 89.2-22.59 1.9 3.32 3.9 6.83 6 10.44 21.93 38.5 37.9 66.35 43.16 73.46C287 421 295 432 310.06 432c5.46 0 10.46-1.4 15.74-2.89l1.53-.43h.12c10.53-3 150.69-52.16 157.87-55.35l.22-.1c5.44-2.41 13.66-6.05 16.18-15.4 1.65-6.12.18-12.33-4.38-18.46l-.07-.09-.07-.09c-.85-1.1-4-5.21-8.27-10.9-9.13-12.07-23.88-31.57-36.84-48.54 17.37-4.5 38.8-10.11 43.38-11.55 11.47-3.43 14.94-10.69 16-14.73.79-3.15 1.82-11.2-5.9-18.85zm-320 58.19c-17.81 4.17-30.22 7.08-37.89 8.9-6.67-13.34-19.74-39.65-32.5-65.33-29.74-59.92-45.1-90.77-53.18-106.9l8.15-.7c13.34-1.15 31.61-2.72 41.78-3.57 16.76 28.26 74.32 125.3 96.3 162.3zM427.58 172zM310.06 416.4zm53.67-56.95c-24.21 8-37.33 12.37-44.42 14.74-6.3-10.34-20.16-33.52-32.47-54.19l115.7-29.48c5 6.81 14.57 19.72 33.46 44.93-18.07 6.04-48.2 16.02-72.27 24zm55.87-121.63l-23.76-31.53c13.67-2.39 21.54-3.77 26.15-4.6l12 14.88 11.94 14.82c-8.2 1.99-17.74 4.32-26.33 6.43z"/>'
            ],
            [
                'title' => 'Github',
                'slug' => 'github',
                'color' => '#6B7280', // equals to gray-500
                'icon' => '<path d="M256 32C132.3 32 32 134.9 32 261.7c0 101.5 64.2 187.5 153.2 217.9a17.56 17.56 0 003.8.4c8.3 0 11.5-6.1 11.5-11.4 0-5.5-.2-19.9-.3-39.1a102.4 102.4 0 01-22.6 2.7c-43.1 0-52.9-33.5-52.9-33.5-10.2-26.5-24.9-33.6-24.9-33.6-19.5-13.7-.1-14.1 1.4-14.1h.1c22.5 2 34.3 23.8 34.3 23.8 11.2 19.6 26.2 25.1 39.6 25.1a63 63 0 0025.6-6c2-14.8 7.8-24.9 14.2-30.7-49.7-5.8-102-25.5-102-113.5 0-25.1 8.7-45.6 23-61.6-2.3-5.8-10-29.2 2.2-60.8a18.64 18.64 0 015-.5c8.1 0 26.4 3.1 56.6 24.1a208.21 208.21 0 01112.2 0c30.2-21 48.5-24.1 56.6-24.1a18.64 18.64 0 015 .5c12.2 31.6 4.5 55 2.2 60.8 14.3 16.1 23 36.6 23 61.6 0 88.2-52.4 107.6-102.3 113.3 8 7.1 15.2 21.1 15.2 42.5 0 30.7-.3 55.5-.3 63 0 5.4 3.1 11.5 11.4 11.5a19.35 19.35 0 004-.4C415.9 449.2 480 363.1 480 261.7 480 134.9 379.7 32 256 32z"/>'
            ],

            [
                'title' => 'Vercel',
                'slug' => 'vercel',
                'color' =>  '#F97316', // equals to orange-500
                'icon' => '<path fill-rule="evenodd" d="M256 48l240 416H16z"/>'
            ],

            [
                'title' => 'Dribbble',
                'slug' => 'dribbble',
                'color' => '#EA4C89', // equals to pink-500
                'icon' => '<path d="M256,32C132.33,32,32,132.33,32,256S132.33,480,256,480,480,379.78,480,256,379.67,32,256,32ZM398.22,135.25a186.36,186.36,0,0,1,44,108.38c-40.37-2.1-88.67-2.1-127.4,1.52-4.9-12.37-9.92-24.5-15.4-36.17C344.08,189.62,378.5,164.18,398.22,135.25ZM256,69.33a185.81,185.81,0,0,1,119.12,42.94c-20.3,25.66-52.15,48-91.82,64.86C261.6,137,236.63,102.47,210,75.28A187.51,187.51,0,0,1,256,69.33ZM171.53,89.75c26.95,26.83,52.27,61,74.44,101C203.85,203.62,155.55,211,104,211c-9.8,0-19.36-.35-28.81-.94A186.78,186.78,0,0,1,171.53,89.75ZM69.68,247.13c10.62.47,21.35.7,32.2.59,58.8-.7,113.52-9.92,160.54-25q6.65,13.83,12.6,28.35a115.43,115.43,0,0,0-16.69,5C194.05,283.07,143.42,326.58,116,379.2A186,186,0,0,1,69.33,256C69.33,253,69.45,250.05,69.68,247.13ZM256,442.67a185.57,185.57,0,0,1-114.45-39.32c24.85-49.23,69.18-90,125.07-115.27,5.25-2.45,12.25-4.43,20.3-6.18q10,27.64,17.85,57.4A678,678,0,0,1,322,430.42,185.06,185.06,0,0,1,256,442.67Zm100.92-29.75a672.61,672.61,0,0,0-17.39-92.05c-4-15.17-8.51-29.87-13.41-44.22,36.63-3,80.5-2.57,115.38,0A186.5,186.5,0,0,1,356.92,412.92Z"/>'
            ]

        ]);



        /** Add main page settings on database */
        Setting::factory()->count(1)->create();

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

        // Create mails
        Mail::factory()->count(100)->create();
    }
}
