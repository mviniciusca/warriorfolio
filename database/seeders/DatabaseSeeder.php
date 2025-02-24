<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alert;
use App\Models\Category;
use App\Models\Course;
use App\Models\Mail;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Post;
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
        Mail::factory()->create();
        Newsletter::factory()->create();
        Course::factory()->create();
        Category::factory()->create();
        Alert::factory()->create();

        /** Pages */
        $this->call([
            LandingPageSeeder::class,
            DocumentationPageSeeder::class,
            BlogSeeder::class,
        ]);

        $post = Post::create([
            'category_id' => 1,
            'user_id'     => 1,
            'resume'      => 'Welcome to Your First Note!',
            'content'     => 'Hello there! 🌟
            <p></p>
This is the beginning of something new—your very first note! Whether you\'re jotting down thoughts, capturing ideas, or simply reminding yourself of something important, this space is yours to explore.
<p></p>
Feel free to write freely, without worrying about perfection. Notes can be messy, creative, practical, or poetic—they\'re a reflection of you. Use them to brainstorm, plan your day, track goals, or even vent when needed. Every journey starts with a single step, and this note is yours.
<p></p>
Who knows? Looking back someday, you might smile at how far you\'ve come.
<p></p>
Here\'s to many more notes ahead! 🚀',
        ]);

        Page::insert([
            'post_id'    => $post->id,
            'user_id'    => 1,
            'title'      => 'First Note',
            'slug'       => 'blog/post/first-note.html',
            'created_at' => now(),
            'updated_at' => now(),
            'style'      => 'blog',
            'layout'     => 'default',
            'blocks'     => json_encode([
                [
                    'data' => [],
                    'type' => 'blog.post',
                ],
            ]),
        ]);
    }
}
