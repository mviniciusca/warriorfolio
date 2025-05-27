@props([
'type' => 'button',
'icon' => null,
'icon_before' => true, // icon position before or after the label
'style' => null ?? 'primary',
'is_section_filled_inverted' => null,
'label' => null,
'size' => null, // deprecated v3.0.0
'color' => null, // deprecated v3.0.0
])

@php
$buttonContent = $label ? new Illuminate\Support\HtmlString($label) : $slot;
@endphp


{{-- Primary - Filled Button --}}
@if ($style === 'primary' && !$is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-primary',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && $icon_before === false)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif


{{-- Primary - Filled Button --}}
@if ($style === 'primary' && $is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-primary-inverse',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && $icon_before === false)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif
