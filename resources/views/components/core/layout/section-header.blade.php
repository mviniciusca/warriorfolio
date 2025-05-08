@props([
// Button Component
'is_section_filled_inverted' => false,
'button_icon' => null ?? 'chevron-forward-outline',
'iconBefore' => false,

// Heading Component
'title' => null,
'subtitle' => null,
'is_centered' => false,
'button_header' => null,
'button_url' => null,
'is_visible' => true,
'is_heading_visible' => true,
])

@if($is_heading_visible)
<div
    class="w-full flex items-center {{ $button_header ? 'justify-between' : ($is_centered ? 'justify-center' : 'justify-start') }} py-6">
    <div class="flex flex-col {{ $is_centered && !$button_header ? 'text-center' : 'text-left' }}">
        @if($title)
        <h2 class="text-2xl font-bold">{!! $title !!}</h2>
        @endif
        @if($subtitle)
        <p class="text-sm mt-1">{!! $subtitle !!}</p>
        @endif
    </div>
    @if($button_header)
    <div>
        @if($button_url)
        <a href="{{ $button_url }}">@endif
            @if($is_section_filled_inverted)
            <button class="bg-black/15 hover:bg-white/5 hover:text-white
                dark:hover:text-black dark:hover:bg-black/5 transition-all duration-300 dark:bg-white/10 text-white
                dark:text-black flex flex-wrap gap-2 border border-white/10 dark:border-black/10 rounded-md
                items-center hover:bg-secondary-200/20 active:opacity-30 justify-center text-xs py-1.5 px-3"
                type="button">
                @if($button_icon && $iconBefore)
                <x-ui.ionicon :icon='$button_icon' />
                @endif
                <span>
                    {!! html_entity_decode($button_header, ENT_QUOTES | ENT_HTML401, 'UTF-8') !!}
                </span>
                @if($button_icon && !$iconBefore)
                <x-ui.ionicon :icon='$button_icon' />
                @endif
            </button>
            @else
            <button class="bg-white/15 hover:bg-black/5 hover:text-black
                dark:hover:text-white dark:hover:bg-white/5 transition-all duration-300 dark:bg-black/10 text-black dark:text-white
                flex flex-wrap gap-2 border border-black/50 dark:border-white/10 rounded-md items-center
                hover:bg-secondary-200/20 active:opacity-30 justify-center text-xs py-1.5 px-3" type="button">
                @if($button_icon && $iconBefore)
                <x-ui.ionicon :icon='$button_icon' />
                @endif
                <span>
                    {!! html_entity_decode($button_header, ENT_QUOTES | ENT_HTML401, 'UTF-8') !!}
                </span>
                @if($button_icon && !$iconBefore)
                <x-ui.ionicon :icon='$button_icon' />
                @endif
            </button>
            @endif
            @if($button_url)
        </a>
        @endif
    </div>
    @endif
</div>
@endif
