<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Course;
use App\Models\Newsletter;
use App\Models\Project;
use App\Models\Setting;
use App\Models\User;
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
                'name' => 'Warriorfolio',
                'email' => 'warriorfolio@test.dev',
            ]);
        Setting::factory()
            ->hasLayout()
            ->hasNavigation()
            ->create([
                'user_id' => $user->id,
            ]);
        $this->call(MailSeeder::class);
        Newsletter::factory()->create();
        Course::factory()->create();
        Category::factory(10)->create();
        // Project::factory(10)->create();
        Alert::factory()->create();

        /** Pages */
        $this->call([
            LandingPageSeeder::class,
            DocumentationPageSeeder::class,
            BlogSeeder::class,
            WelcomeNoteSeeder::class,
            BlogPostSeeder::class,
            PageCommentSeeder::class,
            SectionSeeder::class,
            HeroSectionSeeder::class,
        ]);
    }
}
