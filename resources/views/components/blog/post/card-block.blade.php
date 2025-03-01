@props(['item'])

<article class="rounded-lg border border-secondary-300 bg-transparent p-6 dark:border-secondary-700">
    <div class="mb-5 flex items-center justify-between">
        <span class="flex items-center gap-1 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            {{ $item->post->category->name }}
        </span>
        <span class="text-sm">
            {{ $item->created_at->diffForHumans() }}
        </span>
    </div>
    <h2 class="mb-2 text-2xl font-bold tracking-tight">
        <a class="hover:underline" href="{{ env('APP_URL') . '/' . $item->slug }}">
            {{ Str::words($item->title, 13, '...') }}
    </h2>
    <p class="mb-5 font-light">
        {!! Str::words(strip_tags(preg_replace('/<figure\b[^>]*>.*?<\/figure>/s', '', $item->post->content)), 25, '...') !!}.
    </p>
    </a>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            @if ($item->user->profile->avatar)
                <x-curator-glider class="mx-1 h-7 w-7 rounded-full" :media="$item->user->profile->avatar" />
            @else
                <img class="mx-1 h-7 w-7 rounded-full invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <span class="text-sm font-medium">
                {{ $item->user->name }}
            </span>
        </div>
        <a href="{{ env('APP_URL') . '/' . $item->slug }}"
            class="inline-flex items-center font-medium text-primary-600 hover:underline dark:text-primary-500">
            {{ __('Read more') }}
            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>
