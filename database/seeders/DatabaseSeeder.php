<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mail;
use App\Models\User;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Navigation;
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
        $user = User::factory()
            ->hasProfile()
            ->create([
                'name' => 'Warriorfolio',
                'email' => 'warriorfolio@test.dev',
            ]);

        /** Add main page settings on database */
        $setting = Setting::factory()
            ->hasLayout()
            ->count(1)
            ->create([
                'user_id' => $user->id,
            ]);
        Mail::factory(20)->create();
        Newsletter::factory(10)->create();
        Course::factory(5)->create();
        Category::factory()->create();
        DB::table('pages')
            ->insert([
                'title' => 'Home',
                'slug' => '/',
                'blocks' => '[{"data": {"beam_background_active": null}, "type": "design.blur-background"}, {"data": {"active": null}, "type": "header"}, {"data": {"class": "py-3 md:py-6 lg:py-12"}, "type": "design.empty-separator"}, {"data": {"is_active": true, "is_center": true, "bumper_tag": "New", "bumper_icon": "rocket-outline", "bumper_link": null, "bumper_role": "primary", "is_animated": true, "bumper_title": "Warriorfolio is here with a bunch of new features", "bumper_target": "_self"}, "type": "component.info-bumper"}]',
                'layout' => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        Navigation::factory(1)->create([
            'setting_id' => $setting->first()->id,
            'content' => [
                ["url" => "/", "name" => "Homepage", "target" => "_self", "is_active" => true],
                ["url" => "core/documentation", "name" => "Documentation", "target" => "_self", "is_active" => true],
                ["url" => "https://github.com/mviniciusca", "name" => "Github", "target" => "_blank", "is_active" => true]
            ],
        ]);
    }
}


