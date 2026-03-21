<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageComment>
 */
class PageCommentFactory extends Factory
{
    protected $model = PageComment::class;

    public function definition(): array
    {
        $email = fake()->safeEmail();

        return [
            'page_id' => Page::query()->where('style', 'blog')->inRandomOrder()->value('id')
                ?? throw new \RuntimeException('Create at least one blog Page before using PageCommentFactory.'),
            'parent_id' => null,
            'user_id' => null,
            'author_name' => fake()->name(),
            'author_email' => $email,
            'body' => fake()->paragraphs(2, true),
            'avatar_seed' => PageComment::makeAvatarSeed($email),
            'is_admin' => false,
            'status' => PageComment::STATUS_PENDING,
            'moderated_at' => null,
            'moderated_by' => null,
        ];
    }

    public function approved(?User $moderator = null): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PageComment::STATUS_APPROVED,
            'is_admin' => false,
            'moderated_at' => now(),
            'moderated_by' => $moderator?->id ?? User::query()->value('id'),
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PageComment::STATUS_PENDING,
            'moderated_at' => null,
            'moderated_by' => null,
        ]);
    }

    public function forPage(int $pageId): static
    {
        return $this->state(fn (array $attributes) => [
            'page_id' => $pageId,
        ]);
    }
}
