@foreach ($data as $item)
    @if ($item->is_active)
        <a class="transition-all duration-100 hover:opacity-70" href="{{ env('APP_URL') . '/' . $item->slug }}">
            <div
                class="flex w-full justify-between overflow-hidden border-b border-b-secondary-200 py-8 dark:border-b-secondary-800">
                <div class="w-2/3">
                    <div class="text-md mb-2 font-bold leading-tight tracking-tighter md:text-2xl">
                        {{ Str::words($item->title, 18, '...') }}</div>
                    <p class="text-xs opacity-80 md:text-base">
                        {{ Str::words(strip_tags(preg_replace('/<figure\b[^>]*>.*?<\/figure>/s', '', $item->content)), 15, '...') }}
                    </p>
                    <span class="mt-4 flex items-center justify-between text-sm">
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>

                            <p>{{ $item->category->name }}</p>
                        </span>
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>

                            {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span>
                    </span>
                </div>
                <div
                    class="flex h-24 w-24 items-center justify-center rounded-lg border border-secondary-200 bg-secondary-100 object-center p-4 text-center dark:border-secondary-700 dark:bg-secondary-800 lg:h-32 lg:w-32">
                    @if ($item->img_cover)
                        <x-curator-glider class="rounded-lg object-cover" :media="$item->img_cover" />
                    @else
                        <img class="mb-5 rounded-lg opacity-50 grayscale filter dark:invert"
                            src="{{ asset('img/core/logo-app.svg') }}" />
                    @endif
                </div>
            </div>
        </a>
    @endif
@endforeach
<div class="py-8">
    {{ $data->links() }}
</div>
