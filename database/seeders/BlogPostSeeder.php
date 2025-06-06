<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca o primeiro usuário ou usa o ID 1 como fallback
        $userId = User::first()?->id ?? 1;

        // Busca categorias ativas para blog
        $blogCategories = Category::where('is_blog', true)
            ->where('is_active', true)
            ->pluck('id')
            ->toArray();

        if (empty($blogCategories)) {
            $this->command->error('❌ No active blog categories found! Please create some categories first.');

            return;
        }

        // Títulos realistas para posts de blog sobre tecnologia
        $postTitles = [
            'Getting Started with Laravel 11: A Complete Guide',
            'Building Responsive UIs with Tailwind CSS',
            'JavaScript ES2024: New Features You Should Know',
            'Database Optimization Tips for Better Performance',
            'Creating RESTful APIs with Laravel',
            'Modern CSS Grid Layouts: Beyond Flexbox',
            'Vue.js vs React: Choosing the Right Framework',
            'Docker for Developers: Containerizing Your Apps',
            'Git Workflow Best Practices for Teams',
            'Building Real-time Applications with WebSockets',
            'TypeScript: Adding Type Safety to JavaScript',
            'API Security: Protecting Your Endpoints',
            'Testing Laravel Applications: PHPUnit Guide',
            'Progressive Web Apps: The Future of Web',
            'Database Design Patterns and Best Practices',
            'Optimizing Laravel Performance: Tips and Tricks',
            'Building CLI Tools with PHP Artisan',
            'Understanding MVC Architecture in Web Development',
            'Deploying Laravel Apps to Production',
            'Code Review: Best Practices for Better Code Quality',
        ];

        foreach ($postTitles as $index => $title) {
            // Criar o post com categoria aleatória
            $post = Post::factory()->create([
                'user_id'     => $userId,
                'category_id' => $blogCategories[array_rand($blogCategories)], // Categoria aleatória
            ]);

            // Criar a página associada
            Page::create([
                'post_id' => $post->id,
                'user_id' => $userId,
                'title'   => $title,
                'slug'    => 'blog/post/'.Str::slug($title).'.html',
                'style'   => 'blog',
                'layout'  => 'default',
                'blocks'  => [
                    [
                        'data' => [],
                        'type' => 'blog.post',
                    ],
                ],
                'is_active'  => $post->is_active ?? true,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(0, 5)),
            ]);
        }

        $this->command->info('✅ 20 blog posts created successfully!');
    }
}
