{{-- `embedded`: uso dentro de `<x-ui.modal>` (padding já vem do corpo do modal). --}}
@props([
    'button_text' => null,
    'is_dismissible' => false,
    'show_actions' => true,
    'embedded' => false,
])

<div
    @class([
        'flex w-full flex-col gap-3 sm:flex-row sm:items-center sm:justify-between sm:gap-4',
        'mx-auto max-w-7xl px-4 py-3 md:px-5 md:py-3.5' => ! $embedded,
        'py-0' => $embedded,
    ])>
    <div
        class="min-w-0 flex-1 text-sm leading-relaxed saturn-text prose prose-sm max-w-none dark:prose-invert prose-p:my-1 prose-headings:my-2 prose-headings:font-semibold prose-a:text-primary-600 prose-a:underline prose-a:underline-offset-2 hover:prose-a:text-primary-700 dark:prose-a:text-primary-400 dark:hover:prose-a:text-primary-300 [&_ul]:my-1 [&_ol]:my-1">
        {!! $slot !!}
    </div>
    @if ($show_actions)
        <div class="flex shrink-0 items-center justify-end gap-2 sm:pl-2">
            <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
        </div>
    @endif
</div>
