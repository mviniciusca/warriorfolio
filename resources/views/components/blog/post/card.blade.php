@props(['item' => null])

<div wire:key="{{ $item->id }}">
    <a class="block" href="{{ config('app.url', env('APP_URL')) . '/' . $item->slug }}">
        <div class="flex gap-4 border-b border-secondary-200/30 py-6 dark:border-secondary-800/30">
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
            <div
                class="h-20 w-20 overflow-hidden rounded-lg border border-secondary-200/50 dark:border-secondary-700/50">
                @if ($item->post->img_cover)
                <x-curator-glider class="h-full w-full object-cover" :media="$item->post->img_cover" />
                @else
                <img src="{{ asset('img/core/logo-app.svg') }}" alt="Logo"
                    class="h-full grayscale opacity-30 w-full object-contain p-2" />
                @endif
            </div>
        </div>
    </a>
</div>
