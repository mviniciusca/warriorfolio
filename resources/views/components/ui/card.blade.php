@props([
'header' => null,
'footer' => null,
'is_section_filled_inverted' => false,
'is_border' => false,
'is_card_filled' => false,
'is_content_center' => false,
])

<div class="rounded-lg overflow-hidden p-4
{{ $is_content_center ? 'text-center' : 'text-left' }}
{{ $is_card_filled ? ($is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : 'saturn-bg saturn-text') : '' }}
{{ $is_border ? 'border' : '' }}
{{ $is_border ? ($is_section_filled_inverted ? 'saturn-border-inverse' : 'saturn-border') : '' }}
{{ $is_card_filled ? ($is_section_filled_inverted ? 'saturn-bg-accent-inverse saturn-text-accent-inverse' : 'saturn-bg-accent saturn-text-accent') : '' }}
">
    @if(isset($header))
    <div class="text-sm py-2 font-medium">
        {{ $header }}
    </div>
    @endif

    <div class="text-sm py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="py-2">
        {{ $footer }}
    </div>
    @endif
</div>
