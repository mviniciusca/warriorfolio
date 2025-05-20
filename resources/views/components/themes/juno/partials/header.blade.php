@props(['title' => null, 'subtitle' => null, 'button' => null, 'buttonUrl' => null, 'buttonIcon' => null])

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">{{ $title }}</h2>
        @if ($subtitle)
        <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">{{ $subtitle }}</p>
        @endif
    </div>
    @if ($button && $buttonUrl)
    <x-ui.button style="outlined" :href="$buttonUrl" :icon="$buttonIcon" class="ml-4">
        {{ $button }}
    </x-ui.button>
    @endif
</div>
