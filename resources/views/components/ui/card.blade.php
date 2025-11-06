@props([
'header' => null,
'footer' => null,
'is_filled' => false,
'is_section_filled_inverted' => false,
'is_border' => false,
'is_card_filled' => false,
'is_content_center' => false,
'no_padding' => false,
'role' => null, // success, warning, danger, info, primary, secondary
'link' => null,
])


@php
$roleClasses = '';

if ($role) {
switch ($role) {
case 'success':
$roleClasses = 'saturn-color-success-border';
break;
case 'warning':
$roleClasses = 'saturn-color-warning-border';
break;
case 'danger':
case 'error':
$roleClasses = 'saturn-color-error-border';
break;
case 'info':
$roleClasses = 'saturn-color-info-border';
break;
case 'primary':
$roleClasses = 'saturn-color-primary-border';
break;
case 'secondary':
$roleClasses = 'saturn-color-secondary-border';
break;
}
}
@endphp
<div class="rounded-lg h-full flex flex-col
{{ $no_padding ? 'py-0 px-0' : 'py-2 px-4' }}
{{ $is_content_center ? 'text-center' : 'text-left' }}
{{ $role ? $roleClasses : '' }}
{{ !$role && $is_border && !$is_section_filled_inverted ? 'border saturn-border' : '' }}
{{ !$role && $is_border && $is_section_filled_inverted ? 'border saturn-border-inverse' : '' }}
{{ !$role && $is_card_filled && !$is_filled && !$is_section_filled_inverted ? 'saturn-bg-accent' : '' }}
{{ !$role && $is_card_filled && !$is_filled && $is_section_filled_inverted ? 'saturn-bg-accent-inverse' : '' }}
{{ !$role && $is_filled && $is_card_filled ? 'saturn-bg' : '' }}
">
    @if(isset($header))
    <div class="text-sm py-1 mb-2 font-medium">
        {{ $header }}
    </div>
    @endif

    <div class="text-xs py-1 flex-1">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="py-1">
        {{ $footer }}
    </div>
    @endif
</div>
