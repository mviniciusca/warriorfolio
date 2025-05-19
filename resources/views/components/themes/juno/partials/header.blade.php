@props(['title' => null, 'subtitle' => null, 'button' => null, 'buttonUrl' => null, 'buttonIcon' => null])

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">{{ $title }}</h2>
        @if ($subtitle)
        <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($button && $buttonUrl)
    <a class="inline-flex items-center gap-2 rounded border border-secondary-300 bg-white px-4 py-1 text-xs font-medium text-secondary-900 transition-colors hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:bg-secondary-900"
        href="{{ $buttonUrl }}">
        @if ($buttonIcon)
        <x-ui.ionicon class="h-4 w-4" icon="{{ $buttonIcon }}" />
        @endif
        {{ $button }}
    </a>
    @endif
</div>
