<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Course;
use App\Models\Mail;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Database\Seeders\DocumentationPageSeeder;
use Database\Seeders\LandingPageSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Warriorfolio app seeder.
     * Seed the application's database.
     * Be careful with the order of the factories, because some of them have foreign keys.
     */
    public function run(): void
    {
        $user = User::factory()
            ->hasProfile()
            ->create([
                'name'  => 'Warriorfolio',
                'email' => 'warriorfolio@test.dev',
            ]);
        Setting::factory()
            ->hasLayout()
            ->hasNavigation()
            ->create([
                'user_id' => $user->id,
            ]);
        Mail::factory(100)->create();
        Newsletter::factory(100)->create();
        Course::factory(5)->create();
        Category::factory(5)->create();
        Alert::factory()->create();
        Page::factory(20)->create();

        /** Pages */
        $this->call([
            LandingPageSeeder::class,
            DocumentationPageSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
