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
$roleBorderClasses = '';
$roleTextClasses = '';
if ($role) {
switch ($role) {
case 'primary':
$roleClasses = 'saturn-color-primary';
$roleBorderClasses = 'border border-primary-500/20 dark:border-primary-400/30';
$roleTextClasses = 'text-primary-600 dark:text-primary-600';
break;
case 'secondary':
$roleClasses = 'saturn-color-secondary';
$roleBorderClasses = 'border saturn-border-accent';
$roleTextClasses = 'saturn-text-accent';
break;
case 'success':
$roleClasses = 'saturn-color-success';
$roleBorderClasses = 'border border-green-500/20 dark:border-green-400/30';
$roleTextClasses = 'text-green-600 dark:text-green-600';
break;
case 'danger':
case 'error':
$roleClasses = 'saturn-color-error';
$roleBorderClasses = 'border border-red-500/20 dark:border-red-400/30';
$roleTextClasses = 'text-red-600 dark:text-red-600';
break;
case 'warning':
$roleClasses = 'saturn-color-warning';
$roleBorderClasses = 'border border-yellow-500/20 dark:border-yellow-400/30';
$roleTextClasses = 'text-yellow-600 dark:text-yellow-600';
break;
case 'info':
$roleClasses = 'saturn-color-info';
$roleBorderClasses = 'border border-blue-500/20 dark:border-blue-400/30';
$roleTextClasses = 'text-blue-600 dark:text-blue-600';
break;
}
}
@endphp

<div class="rounded-lg overflow-hidden py-2 px-4 min-h-24
{{ $is_content_center ? 'text-center' : 'text-left' }}
{{ $role && $is_card_filled ? $roleClasses : '' }}
{{ $role && !$is_card_filled ? $roleBorderClasses . ' ' . $roleTextClasses : '' }}
{{ !$role ? ($is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : 'saturn-bg saturn-text') : '' }}
{{ !$role && $is_border ? 'border' : '' }}
{{ !$role && $is_border ? ($is_section_filled_inverted ? 'saturn-border-inverse' : 'saturn-border') : '' }}
">
    @if(isset($header))
    <div class="text-sm py-1 mb-2 font-medium">
        {{ $header }}
    </div>
    @endif

    <div class="text-xs py-1">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="py-1">
        {{ $footer }}
    </div>
    @endif
</div>
