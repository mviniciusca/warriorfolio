<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateBlogPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:create-posts {count=5 : Number of posts to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake blog posts with realistic content for testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = (int) $this->argument('count');
        $userId = User::first()?->id ?? 1;

        $this->info("Creating {$count} blog posts...");

        $techTopics = [
            'Advanced Laravel Techniques You Should Know',
            'Building Scalable APIs with PHP',
            'Modern JavaScript: ES2024 Features',
            'Database Performance Optimization',
            'Responsive Design with CSS Grid',
            'Vue.js Component Architecture',
            'Docker for Development Environments',
            'Git Best Practices for Teams',
            'WebSocket Implementation Guide',
            'TypeScript for Backend Development',
            'Microservices with Laravel',
            'Testing Strategies for Web Apps',
            'Progressive Web App Development',
            'Secure Authentication Patterns',
            'CI/CD Pipeline Setup',
            'Code Quality and Review Process',
            'API Documentation Best Practices',
            'Database Design Patterns',
            'Performance Monitoring Tools',
            'DevOps Automation Strategies',
        ];

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        for ($i = 0; $i < $count; $i++) {
            $title = $techTopics[array_rand($techTopics)] ?? "Tech Article #{$i}";

            $post = Post::factory()->create([
                'user_id' => $userId,
            ]);

            Page::create([
                'post_id' => $post->id,
                'user_id' => $userId,
                'title'   => $title,
                'slug'    => 'blog/post/'.Str::slug($title).'-'.time().'.html',
                'style'   => 'blog',
                'layout'  => 'default',
                'blocks'  => [
                    [
                        'data' => [],
                        'type' => 'blog.post',
                    ],
                ],
                'is_active'  => $post->is_active,
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now()->subDays(rand(0, 5)),
            ]);

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("✅ Successfully created {$count} blog posts!");
        $this->info('📊 Total posts in database: '.Post::count());
        $this->info('📄 Total pages in database: '.Page::count());
    }
}
