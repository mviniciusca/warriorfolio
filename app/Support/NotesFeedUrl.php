<?php

namespace App\Support;

use Illuminate\Support\Facades\Request;

/**
 * URLs do feed público do blog (for-you, featured, category).
 * Usado no Blade em vez de passar Closures nas props (Livewire sanitiza e remove closures).
 */
final class NotesFeedUrl
{
    public static function build(string $feed, ?int $categoryId = null): string
    {
        $query = Request::except(['page', 'feed', 'category_id']);
        $query['feed'] = $feed;
        if ($feed === 'category' && $categoryId) {
            $query['category_id'] = $categoryId;
        }

        return Request::url().'?'.http_build_query($query);
    }
}
