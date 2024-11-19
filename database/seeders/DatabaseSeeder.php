<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Course;
use App\Models\Mail;
use App\Models\Navigation;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        Page::factory()->create();

        Mail::factory(10)->create();
        Newsletter::factory(10)->create();
        Course::factory(3)->create();
        Category::factory()->create();
        Alert::factory()->create();
    }
}
