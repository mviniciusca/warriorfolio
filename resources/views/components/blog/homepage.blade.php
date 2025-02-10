@foreach ($data as $item)
    @if ($item->is_active)
        <a class="transition-all duration-100 hover:opacity-70" href="{{ env('APP_URL') . '/' . $item->slug }}">
            <div
                class="flex w-full justify-between overflow-hidden border-b border-b-secondary-200 py-8 dark:border-b-secondary-800">
                <div class="w-2/3">
                    <div class="mb-2 text-2xl font-bold leading-tight tracking-tighter">{{ $item->title }}</div>
                    <p class="text-base opacity-80">
                        {{ Str::words(strip_tags(preg_replace('/<figure\b[^>]*>.*?<\/figure>/s', '', $item->content)), 20, '...') }}
                    </p>
                    <span class="mt-4 flex items-center justify-between text-sm">
                        <span class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            <p>{{ $item->category->name }}</p>
                        </span>
                        <p> {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</p>
                    </span>
                </div>
                <div class="w-32">
                    @if ($item->img_cover)
                        <x-curator-glider class="rounded-lg object-cover" :media="$item->img_cover" />
                    @else
                        <img class="mb-5 rounded-lg opacity-90" src="{{ asset('img/core/logo-app.svg') }}" />
                    @endif
                </div>
            </div>
        </a>
    @endif
@endforeach
<div class="py-8">
    {{ $data->links() }}
</div>
