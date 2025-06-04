<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "updated" event.
     * Sync the is_active status between Post and Page models.
     */
    public function updated(Post $post): void
    {
        // Verifica se o campo is_active foi alterado
        if ($post->isDirty('is_active')) {
            // Atualiza todas as páginas relacionadas a este post
            $post->page()->update([
                'is_active' => $post->is_active
            ]);
        }
    }
}
