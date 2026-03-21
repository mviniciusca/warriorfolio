<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageComment;
use Illuminate\Database\Seeder;

class PageCommentSeeder extends Seeder
{
    public function run(): void
    {
        $targetPage = Page::query()
            ->where('style', 'blog')
            ->where('id', 4)
            ->first();

        if (! $targetPage) {
            $targetPage = Page::query()
                ->where('style', 'blog')
                ->orderBy('id')
                ->first();
        }

        if (! $targetPage) {
            $this->command?->warn('No blog page found to seed comments.');

            return;
        }

        $rootPending = PageComment::query()->firstOrCreate(
            [
                'page_id' => $targetPage->id,
                'author_email' => 'pending.comment@warriorfolio.dev',
                'body' => 'Pending moderation comment (seeded).',
            ],
            [
                'parent_id' => null,
                'author_name' => 'Pending Seeder',
                'status' => PageComment::STATUS_PENDING,
            ]
        );

        $approved = PageComment::query()->firstOrCreate(
            [
                'page_id' => $targetPage->id,
                'author_email' => 'approved.comment@warriorfolio.dev',
                'body' => 'Approved comment (seeded).',
            ],
            [
                'parent_id' => null,
                'author_name' => 'Approved Seeder',
                'status' => PageComment::STATUS_APPROVED,
                'moderated_at' => now(),
            ]
        );

        PageComment::query()->firstOrCreate(
            [
                'page_id' => $targetPage->id,
                'author_email' => 'reply.comment@warriorfolio.dev',
                'body' => 'Reply pending moderation (seeded).',
            ],
            [
                'parent_id' => $approved->id,
                'author_name' => 'Reply Seeder',
                'status' => PageComment::STATUS_PENDING,
            ]
        );

        $this->command?->info("Seeded comments for blog page ID {$targetPage->id}.");
        $this->command?->info("Pending comment ID {$rootPending->id} is ready for admin moderation.");
    }
}
