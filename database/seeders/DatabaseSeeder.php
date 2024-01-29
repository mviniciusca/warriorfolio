<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mail;
use App\Models\User;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Slideshow;
use App\Models\Newsletter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /** Create a new user on database */
        User::factory()
            ->hasProfile()
            ->create([
                'name' => 'Warriorfolio',
                'email' => 'warriorfolio@test.dev',
            ]);

        /** Add main page settings on database */
        Setting::factory()
            ->hasLayout()
            ->count(1)
            ->create();
        Mail::factory(5)->create();
        Newsletter::factory(5)->create();
        Course::factory(5)->create();
        Category::factory()->create();
        DB::table('pages')
            ->insert([
                'title' => 'Home',
                'slug' => '/',
                'blocks' => '[{"data": [], "type": "design.blur-background"}, {"data": [], "type": "design.blur-separator"}, {"data": [], "type": "header"}, {"data": [], "type": "hero"}, {"data": [], "type": "design.blur-separator"}, {"data": [], "type": "courses"}, {"data": [], "type": "projects"}, {"data": [], "type": "client"}, {"data": [], "type": "design.empty-separator"}, {"data": [], "type": "design.blur-background"}, {"data": [], "type": "contact"}, {"data": [], "type": "design.blur-background"}, {"data": [], "type": "newsletter"}, {"data": [], "type": "footer"}, {"data": [], "type": "design.blur-separator"}]',
                'layout' => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
