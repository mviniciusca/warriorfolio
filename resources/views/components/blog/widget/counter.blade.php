@if ($blog_data['is_trend_widget_active'] ?? false)
    @if ($data)
        <div>
            <h1 class="my-6 flex justify-between text-base font-bold">
                <p>{{ _('Trends') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
            </h1>
            @foreach ($data as $item)
                <div
                    class="flex justify-between border-b border-b-secondary-100 py-2 pb-3 font-mono text-sm uppercase dark:border-b-slate-800">
                    <p>{{ $item['label'] }}</p>
                    <p class="rounded-lg bg-primary-800 px-3 text-center text-white shadow-inner">{{ $item['count'] }}
                    </p>
                </div>
            @endforeach
        </div>
    @endif
@endif
