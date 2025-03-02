<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Seeder;

class WelcomeNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create($this->getPostData());

        Page::create($this->getPageData($post->id));
    }

    private function getPostData(): array
    {
        return [
            'category_id' => 1,
            'user_id'     => 1,
            'resume'      => 'Notes is your go-to tool to organize ideas, tasks, and inspirations in one simple and efficient place!',
            'content'     => $this->getContent(),
        ];
    }

    private function getPageData(int $postId): array
    {
        return [
            'post_id' => $postId,
            'user_id' => 1,
            'title'   => 'Welcome to your First Note 📝',
            'slug'    => 'blog/post/first-note.html',
            'style'   => 'blog',
            'layout'  => 'default',
            'blocks'  => [
                [
                    'data' => [],
                    'type' => 'blog.post',
                ]],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function getContent(): string
    {
        return <<<'HTML'
        Hello there! 🌟<p></p>
        This is the beginning of something new—your very first note! Whether you're jotting down thoughts, capturing ideas, or simply reminding yourself of something important, this space is yours to explore.<br/><br/>
        Feel free to write freely, without worrying about perfection. Notes can be messy, creative, practical, or poetic—they're a reflection of you. Use them to brainstorm, plan your day, track goals, or even vent when needed. Every journey starts with a single step, and this note is yours.<br/><br/>
        Who knows? Looking back someday, you might smile at how far you've come.<br/><br/>
        Here's to many more notes ahead! 🚀
        HTML;
    }
}
