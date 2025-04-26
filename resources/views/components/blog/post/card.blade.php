@props(['item' => null])

<div wire:key="{{ $item->id }}">
    <a class="block" href="{{ config('app.url', env('APP_URL')) . '/' . $item->slug }}">
        <div class="flex gap-3 border-b border-secondary-200/30 py-3 dark:border-secondary-800/30">
            <div class="flex-1 space-y-1.5">
                <h2 class="text-base font-medium leading-snug">
                    {{ Str::words($item->title, 18, '...') }}
                </h2>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    {{ Str::words(strip_tags(preg_replace('#<figure\b[^>]*>.*?</figure>#is', '', $item->post?->content
                        ?? '')), 15, '...') }}
                </p>
                <div class="flex items-center gap-3 text-xs text-gray-500">
                    <span>{{ $item->post->category->name }}</span>
                    <span>·</span>
                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>
                </div>
            </div>
            <div class="h-14 w-14">
                @if ($item->post->img_cover)
                <x-curator-glider class="h-full w-full object-cover" :media="$item->post->img_cover" />
                @else
                <div class="h-full w-full bg-secondary-100/50 dark:bg-secondary-800/50"></div>
                @endif
            </div>
        </div>
    </a>
</div>
