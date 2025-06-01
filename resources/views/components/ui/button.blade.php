@props([
'icon' => null,
'label' => null,
'type' => 'button',
'icon_before' => true,
'style' => 'primary',
'is_section_filled_inverted' => null,
'size' => null, // deprecated v3.0.0
'color' => null, // deprecated v3.0.0
])

@php
$buttonContent = $label ? new Illuminate\Support\HtmlString($label) : $slot;
@endphp

{{-- Primary Button --}}
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
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Primary Inverse --}}
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
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Secondary Button --}}
@if ($style === 'secondary' && !$is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-secondary',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Secondary Inverse --}}
@if ($style === 'secondary' && $is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-secondary-inverse',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Outlined --}}
@if ($style === 'outlined' && !$is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-outlined',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Outlined Inverse --}}
@if ($style === 'outlined' && $is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-outlined-inverse',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Ghost --}}
@if ($style === 'ghost' && !$is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-ghost',
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

{{-- Ghost Inverse --}}
@if ($style === 'ghost' && $is_section_filled_inverted)
<button {{ $attributes->class([
    'saturn-btn-ghost-inverse',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {!! $buttonContent !!}
    </span>
    @if ($icon && !$icon_before)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif
