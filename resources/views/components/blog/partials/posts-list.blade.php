@props(['posts', 'active_category' => null])

@php
    $listTitle = __('Latest Articles');
    if (request('search')) {
        $listTitle = __('Search Results');
    } else {
        $f = request('feed', 'for-you');
        if (! in_array($f, ['for-you', 'featured', 'category'], true)) {
            $f = 'for-you';
        }
        if ($f === 'featured') {
            $listTitle = __('Featured');
        } elseif ($f === 'category' && $active_category) {
            $listTitle = $active_category->name;
        }
    }
@endphp

<div class="space-y-5 md:space-y-8">
    <div class="mb-0 flex items-center justify-between sm:mb-2">
        <h3 class="saturn-text text-lg font-bold tracking-tight sm:text-xl md:text-2xl">
            {{ $listTitle }}
        </h3>
    </div>

    <div>
        @if ($posts->count() > 0)
            <x-blog.partials.recent-posts :$posts />
        @else
            <x-blog.partials.empty-state />
        @endif
    </div>

    @if ($posts->hasPages())
        <div class="mt-8 md:mt-12">
            <x-ui.pagination :paginator="$posts" />
        </div>
    @endif
</div>
