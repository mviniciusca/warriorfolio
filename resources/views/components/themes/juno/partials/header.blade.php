@props(['title' => null, 'subtitle' => null, 'button' => null, 'buttonUrl' => null, 'buttonIcon' => null])

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">{!! $title !!}</h2>
        @if ($subtitle)
        <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">{!! $subtitle !!}</p>
        @endif
    </div>
    @if ($button && $buttonUrl)
    {{-- <a>: x-ui.button só renderiza <button>, que ignora href no clique --}}
    <a href="{{ $buttonUrl }}" class="saturn-btn-outlined ml-4">
        @if ($buttonIcon)
            <x-ui.ionicon :icon="$buttonIcon" />
        @endif
        <span>{!! $button !!}</span>
    </a>
    @endif
</div>
