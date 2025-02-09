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
                    <p class="mt-4 text-sm">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                    </p>
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
