@props(['categories' => collect()])

@php
    use App\Support\NotesFeedUrl;

    $capCount = static function (int $n): int|string {
        return $n <= 99 ? $n : '+99';
    };
@endphp

<div id="blog-topics" class="rounded-xl border saturn-border p-6 saturn-text sm:p-8">
    <h2 class="mb-1 flex items-center justify-between gap-2 text-base font-semibold tracking-tight saturn-text">
        {{ __('Topics') }}
        <x-ui.ionicon icon="pricetag-outline" class="h-5 w-5 shrink-0 opacity-50" aria-hidden="true" />
    </h2>
    <p class="mb-4 text-xs leading-relaxed saturn-text-accent">
        {{ __('All categories. Tap a tag to filter.') }}
    </p>
    @if ($categories->isNotEmpty())
        <nav aria-label="{{ __('Topics') }}" class="flex flex-wrap gap-2">
            @foreach ($categories as $cat)
                @php
                    $noteCount = (int) ($cat->published_notes_count ?? 0);
                    $isActive =
                        request('feed') === 'category' && (int) request('category_id') === (int) $cat->id;
                @endphp
                <a href="{{ NotesFeedUrl::build('category', (int) $cat->id) }}"
                    @if ($isActive) aria-current="page" @endif
                    class="inline-flex max-w-full items-center gap-1.5 rounded-full border border-current/15 px-3 py-1 text-xs font-medium no-underline transition-colors dark:border-white/15 @if ($isActive) saturn-bg-accent saturn-text @else saturn-text-accent hover:border-current/30 hover:saturn-text @endif">
                    <span class="min-w-0 truncate">{{ ucfirst($cat->name) }}</span>
                    <span class="shrink-0 tabular-nums opacity-60" aria-hidden="true">{{ $capCount($noteCount) }}</span>
                </a>
            @endforeach
        </nav>
    @else
        <p class="text-sm saturn-text-accent">
            {{ __('No active categories yet. Add them in the admin, or run migrations and db:seed for the demo dataset.') }}
        </p>
    @endif
</div>
