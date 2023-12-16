<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Mail;
use App\Models\User;
use App\Models\Setting;
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
        User::factory()->create([
            'name' => 'Warriorfolio',
            'email' => 'warriorfolio@test.dev',
        ]);

        /** Add main page settings on database */
        Setting::factory()
            ->hasLayout()
            ->count(1)
            ->create();
        Mail::factory(50)->create();
        Newsletter::factory(50)->create();
        DB::table('pages')
            ->insert([
                'title' => 'Home',
                'slug' => '/',
                'blocks' => '[{"data": [], "type": "hero"}]',
                'layout' => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
