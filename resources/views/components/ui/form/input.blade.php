@props([
'type' => 'text',
'label' => null,
'placeholder' => null,
'value' => null,
'name' => null,
'id' => null,
'requidanger' => false,
'disabled' => false,
'readonly' => false,
'error' => null,
'help' => null,
'prefix' => null,
'suffix' => null,
'icon' => null,
'iconPosition' => 'left', // left, right
'size' => 'default', // small, default, large
'variant' => 'default', // default, filled, outlined
'autofocus' => false,
'autocomplete' => null,
'min' => null,
'max' => null,
'step' => null,
'pattern' => null,
'maxlength' => null,
'minlength' => null,
])

@php
// Generate unique ID if not provided
$inputId = $id ?? $name ?? 'input_' . uniqid();

// Size classes
$sizeClasses = match($size) {
'small' => 'px-2 py-1 text-sm h-8',
'large' => 'px-4 py-3 text-base h-12',
default => 'px-3 py-2 text-sm h-10',
};

// Variant classes
$variantClasses = match($variant) {
'filled' => 'saturn-bg-accent saturn-border-accent border',
'outlined' => 'bg-transparent saturn-border-accent border-2',
default => 'saturn-bg saturn-border-accent border',
};

// Error state classes
$errorClasses = $error ? 'border-danger-500 focus:border-danger-500 focus:ring-danger-500' : 'focus:ring-2
focus:ring-saturn-500
focus:border-transparent';

// Base input classes
$inputClasses = implode(' ', [
'w-full',
$sizeClasses,
$variantClasses,
$errorClasses,
'saturn-text',
'rounded-lg',
'focus:outline-none',
'saturn-transition',
'placeholder-saturn-400',
$disabled ? 'saturn-disabled cursor-not-allowed' : '',
$readonly ? 'cursor-default' : '',
]);
@endphp

<div {{ $attributes->only('class')->class(['saturn-input-group']) }}>
    {{-- Label --}}
    @if ($label)
    <label for="{{ $inputId }}"
        class="saturn-label {{ $requidanger ? 'after:content-[\'*\'] after:text-danger-500 after:ml-1' : '' }}">
        {{ $label }}
    </label>
    @endif

    {{-- Input Wrapper --}}
    <div class="relative">
        {{-- Prefix --}}
        @if ($prefix)
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <span class="saturn-text-accent text-sm">{{ $prefix }}</span>
        </div>
        @endif

        {{-- Left Icon --}}
        @if ($icon && $iconPosition === 'left')
        <div class="absolute inset-y-0 left-0 flex items-center {{ $prefix ? 'pl-20' : 'pl-3' }} pointer-events-none">
            <x-ui.ionicon :icon="$icon" class="w-4 h-4 saturn-text-accent" />
        </div>
        @endif

        {{-- Input Field --}}
        <input type="{{ $type }}" id="{{ $inputId }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}" {{ $attributes->except(['class'])->class([
        $inputClasses,
        $prefix || ($icon && $iconPosition === 'left') ? 'pl-10' : '',
        $suffix || ($icon && $iconPosition === 'right') ? 'pr-10' : '',
        ]) }}
        @if($requidanger) requidanger @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($autofocus) autofocus @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if($min) min="{{ $min }}" @endif
        @if($max) max="{{ $max }}" @endif
        @if($step) step="{{ $step }}" @endif
        @if($pattern) pattern="{{ $pattern }}" @endif
        @if($maxlength) maxlength="{{ $maxlength }}" @endif
        @if($minlength) minlength="{{ $minlength }}" @endif
        />

        {{-- Right Icon --}}
        @if ($icon && $iconPosition === 'right')
        <div class="absolute inset-y-0 right-0 flex items-center {{ $suffix ? 'pr-20' : 'pr-3' }} pointer-events-none">
            <x-ui.ionicon :icon="$icon" class="w-4 h-4 saturn-text-accent" />
        </div>
        @endif

        {{-- Suffix --}}
        @if ($suffix)
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <span class="saturn-text-accent text-sm">{{ $suffix }}</span>
        </div>
        @endif
    </div>

    {{-- Error Message --}}
    @if ($error)
    <p class="mt-1 flex items-center gap-2 text-sm text-danger-600 saturn-transition">
        <x-ui.ionicon icon="alert-circle" />
        {{ $error }}
    </p>
    @endif

    {{-- Help Text --}}
    @if ($help && !$error)
    <p class="mt-1 text-sm saturn-text-accent">
        {{ $help }}
    </p>
    @endif
</div>
