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
$baseSuffix = $is_border ? '-border' : '';
switch ($role) {
case 'success':
$roleClasses = 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800';
break;
case 'warning':
$roleClasses = 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800';
break;
case 'danger':
case 'error':
$roleClasses = 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800';
break;
case 'info':
$roleClasses = 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800';
break;
case 'primary':
$roleClasses = 'bg-indigo-50 dark:bg-indigo-900/20 border-indigo-200 dark:border-indigo-800';
break;
case 'secondary':
$roleClasses = 'bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700';
break;
case 'accent':
$roleClasses = 'saturn-bg-accent' . $baseSuffix;
break;
}
}
@endphp
<div class="rounded-lg h-full flex flex-col
{{ $no_padding ? 'py-0 px-0' : 'py-2 px-4' }}
{{ $is_content_center ? 'text-center' : 'text-left' }}
{{ $role ? $roleClasses . ' border' : '' }}
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
