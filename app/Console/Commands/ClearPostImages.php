<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class ClearPostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:clear-images {--confirm : Skip confirmation prompt}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove featured images from all blog posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postsWithImages = Post::whereNotNull('img_cover')->count();

        if ($postsWithImages === 0) {
            $this->info('✅ No posts with featured images found.');

            return 0;
        }

        $this->info("Found {$postsWithImages} posts with featured images.");

        if (! $this->option('confirm')) {
            if (! $this->confirm('Do you want to remove all featured images from blog posts?')) {
                $this->info('Operation cancelled.');

                return 0;
            }
        }

        $this->info('Removing featured images from posts...');

        $progressBar = $this->output->createProgressBar($postsWithImages);
        $progressBar->start();

        $updatedCount = 0;
        Post::whereNotNull('img_cover')->chunk(100, function ($posts) use (&$updatedCount, $progressBar) {
            foreach ($posts as $post) {
                $post->update(['img_cover' => null]);
                $updatedCount++;
                $progressBar->advance();
            }
        });

        $progressBar->finish();
        $this->newLine();

        $this->info("✅ Successfully removed featured images from {$updatedCount} posts.");

        return 0;
    }
}
