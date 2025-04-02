@props(['item'])

<article
    class="rounded-lg border border-secondary-300 bg-white/30 p-6 transition duration-200 ease-in-out hover:bg-gradient-to-br hover:from-primary-100/0 hover:to-secondary-200/30 dark:border-secondary-800 dark:bg-black/30 dark:hover:from-primary-600/0 dark:hover:to-secondary-700/30">
    <div class="mb-5 flex items-center justify-between">
        <span class="flex items-center gap-1 text-sm">
            <svg class="size-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ $item->post->category->name }}
        </span>
        <span class="text-sm">
            {{ $item->created_at->diffForHumans() }}
        </span>
    </div>
    <h2 class="mb-2 text-xl font-bold tracking-tight md:text-lg">
        <a class="hover:underline" href="{{ env('APP_URL') . '/' . $item->slug }}">
            {{ Str::words($item->title, 13, '...') }}
    </h2>
    <p class="mb-5 text-sm opacity-70">
        {{ Str::words(
            preg_replace('/<figure[^>]*>.*?<\/figure>/s', '', strip_tags($item->post->content, '<figure>')),
            20,
            '...',
        ) }}
    </p>
    </a>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            @if ($item->user->profile->avatar)
                <img class="mx-1 h-7 w-7 rounded-full" src="{{ asset('storage/' . $item->user->profile->avatar) }}" />
            @else
                <img class="mx-1 h-7 w-7 rounded-full invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <span class="text-sm font-medium">
                {{ $item->user->name }}
            </span>
        </div>
        <a class="inline-flex items-center text-sm font-medium hover:underline"
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
