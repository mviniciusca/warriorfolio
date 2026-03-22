@php
    $record = $getRecord();
    $created = $record->created_at ? \Carbon\Carbon::parse($record->created_at) : null;
    $initials = strtoupper(
        collect(preg_split('/\s+/', trim((string) $record->name), -1, PREG_SPLIT_NO_EMPTY))
            ->take(2)
            ->map(fn (string $part) => mb_substr($part, 0, 1))
            ->implode(''),
    );
    if ($initials === '') {
        $initials = '?';
    }
    $toLabel = filament()->auth()->user()
        ? filament()->getUserName(filament()->auth()->user())
        : config('app.name');
    $dateLabel = $created
        ? $created->copy()->timezone(config('app.timezone'))->locale(app()->getLocale())->isoFormat('LLL')
        : null;
@endphp

<div {{ $attributes->class(['w-full font-sans']) }}>
    {{ $getChildComponentContainer() }}

    <div class="mail-read-panel w-full bg-transparent font-sans dark:bg-transparent">
        <div class="px-4 py-4 sm:px-8 sm:py-5">
            <h1 class="text-xl font-semibold leading-snug text-zinc-900 dark:text-zinc-50 sm:text-[1.375rem]">
                {{ filled($record->subject) ? $record->subject : __('No Subject') }}
            </h1>
        </div>

        <div
            class="flex flex-col gap-4 px-4 py-4 sm:flex-row sm:items-start sm:justify-between sm:px-8 sm:py-5">
            <div class="flex min-w-0 flex-1 gap-4">
                <div
                    class="flex size-10 shrink-0 items-center justify-center rounded-full bg-primary-600 text-sm font-semibold text-white shadow-sm dark:bg-primary-500 sm:size-12 sm:text-base">
                    {{ $initials }}
                </div>
                <div class="min-w-0 flex-1 space-y-1">
                    <div class="flex flex-wrap items-baseline gap-x-2 gap-y-0.5">
                        <span class="text-base font-semibold text-zinc-900 dark:text-zinc-100">
                            {{ $record->name }}
                        </span>
                        <span class="text-sm text-zinc-600 dark:text-zinc-400">
                            &lt;{{ $record->email }}&gt;
                        </span>
                    </div>
                    @if (! $record->is_sent)
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">
                            <span class="text-zinc-400 dark:text-zinc-500">{{ __('To') }}</span>
                            <span class="font-medium text-zinc-700 dark:text-zinc-300">{{ $toLabel }}</span>
                        </p>
                    @else
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">
                            <span class="text-zinc-400 dark:text-zinc-500">{{ __('To') }}</span>
                            <span class="font-medium text-zinc-700 dark:text-zinc-300">{{ $record->email }}</span>
                        </p>
                    @endif
                    @if (filled($record->phone))
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">
                            {{ $record->phone }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="flex shrink-0 flex-col items-start gap-2 sm:items-end">
                @if ($dateLabel)
                    <time class="text-sm text-zinc-500 dark:text-zinc-400"
                        datetime="{{ $created->toIso8601String() }}"
                        title="{{ $created->timezone(config('app.timezone'))->format('l, F j, Y \a\t g:i A') }}">
                        {{ $dateLabel }}
                    </time>
                @endif
                <div class="flex items-center gap-1 text-zinc-400 dark:text-zinc-500">
                    @if ($record->is_important)
                        <x-heroicon-s-star class="size-5 text-amber-500" />
                    @endif
                    @if ($record->is_sent)
                        <x-heroicon-o-arrow-up-tray class="size-5" />
                    @else
                        <x-heroicon-o-arrow-down-tray class="size-5" />
                    @endif
                </div>
            </div>
        </div>

        <div class="px-4 pb-10 pt-6 sm:px-8 sm:pb-12">
            <div
                class="mail-read-body mx-auto w-full max-w-none text-[0.9375rem] leading-relaxed text-zinc-800 dark:text-zinc-200 [&_a]:text-primary-600 [&_a]:underline dark:[&_a]:text-primary-400 [&_blockquote]:my-4 [&_blockquote]:border-s-2 [&_blockquote]:border-zinc-300 [&_blockquote]:ps-4 [&_blockquote]:text-zinc-600 dark:[&_blockquote]:border-zinc-600 dark:[&_blockquote]:text-zinc-400 [&_h1]:mb-2 [&_h1]:text-xl [&_h1]:font-semibold [&_h2]:mb-2 [&_h2]:text-lg [&_h2]:font-semibold [&_img]:max-w-full [&_li]:my-0.5 [&_ol]:my-3 [&_ol]:list-decimal [&_ol]:ps-6 [&_p]:mb-3 [&_p]:last:mb-0 [&_table]:max-w-full [&_ul]:my-3 [&_ul]:list-disc [&_ul]:ps-6">
                {!! $record->body !!}
            </div>
        </div>
    </div>
</div>
