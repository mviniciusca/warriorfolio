@props(['posts'])

<div class="space-y-8">
    <div class="flex items-center justify-between">
        <h3 class="text-xl font-semibold">
            @if(request('search'))
            {{ __('Search Results') }}
            @else
            {{ __('Latest Articles') }}
            @endif
        </h3>
    </div>

    <div class="space-y-8">
        @if($posts->count() > 0)
        <x-blog.partials.recent-posts :$posts />
        @else
        <x-blog.partials.empty-state />
        @endif
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
    <div class="mt-12">
        <x-ui.pagination :paginator="$posts" />
    </div>
    @endif
</div>
