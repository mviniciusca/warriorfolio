@props([
'header' => null,
'footer' => null,
'is_filled' => false,
'is_section_filled_inverted' => false,
'is_border' => false,
'is_card_filled' => false,
'is_content_center' => false,
'role' => null, // primary, secondary, success, danger, warning, info
])

@php
$roleClasses = '';
if ($role) {
switch ($role) {
case 'primary':
$roleClasses = 'saturn-color-primary';
break;
case 'secondary':
$roleClasses = 'saturn-color-secondary';
break;
case 'success':
$roleClasses = 'saturn-color-success';
break;
case 'danger':
case 'error':
$roleClasses = 'saturn-color-error';
break;
case 'warning':
$roleClasses = 'saturn-color-warning';
break;
case 'info':
$roleClasses = 'saturn-color-info';
break;
}
}
@endphp

<div class="rounded-lg overflow-hidden p-4
{{ $is_content_center ? 'text-center' : 'text-left' }}
{{ $role ? $roleClasses : '' }}
{{ !$role && $is_card_filled ? ($is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : 'saturn-bg saturn-text') : '' }}
{{ !$role && $is_border ? 'border' : '' }}
{{ !$role && $is_border ? ($is_section_filled_inverted ? 'saturn-border-inverse' : 'saturn-border') : '' }}
{{ !$role && $is_card_filled && !$is_filled ? ($is_section_filled_inverted ? 'saturn-bg-accent-inverse saturn-text-accent-inverse' : 'saturn-bg-accent saturn-text-accent') : '' }}
{{ !$role && $is_card_filled && $is_filled ? ($is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : 'saturn-bg saturn-text') : '' }}
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
