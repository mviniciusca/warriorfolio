<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PagesSettings;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Timeline;
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
        Profile::factory()->count(1)->create();
    }
}
