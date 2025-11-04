@props(['item'])

<article
    class="flex h-full flex-col rounded-lg border saturn-border bg-white/30 p-8 transition-all duration-500 hover:bg-gradient-to-br hover:from-primary-100/0 hover:to-secondary-200/20 dark:bg-black/30 dark:hover:from-saturn-600/0 dark:hover:to-saturn-700/30">
    <div class="mb-5 flex items-center justify-between">
        <span class="flex items-center gap-1 text-xs">
            {{ ucfirst($item->post->category->name) }}
        </span>
        <span class="text-xs">
            {{ $item->created_at->diffForHumans() }}
        </span>
    </div>
    <h2 class="mb-2 font-medium text-sm">
        <a class="hover:underline" href="{{ config('app.url', env('APP_URL')) . '/' . $item->slug }}">
            {{ Str::words($item->title, 20, '...') }}
    </h2>
    <p class="mb-5 flex-grow text-xs opacity-70">
        {{ formatContent($item->post->content) }}
    </p>
    </a>
    <div class="mt-auto flex items-center justify-between">
        <div class="flex items-center space-x-2">
            @if ($item->user->profile->avatar)
            <img class="mx-1 h-7 w-7 rounded-full" src="{{ asset('storage/' . $item->user->profile->avatar) }}" />
            @else
            <img class="mx-1 h-7 w-7 rounded-full invert-0 dark:invert"
                src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <span class="text-xs font-medium">
                {{ $item->user->name }}
            </span>
        </div>
        <a class="inline-flex items-center text-xs font-medium hover:underline"
            href="{{ env('APP_URL') . '/' . $item->slug }}">
            {{ __('Read more') }}
            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    fill-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>
