{{--

Core: Main Background Component
----------------------------------------------------------------
This component is used to display the background image of the page.

Important: When visibility is set to true, the background image will be displayed. Even without a uploaded image, a
default image will be displayed.

--}}

@props([
    'design' => null,
    'bg_is_active' => $design['background_image_visibility'] ?? false,
    'bg_size' => $design['background_image_size'] ?? 'bg-auto',
    'bg_position' => $design['background_image_position'] ?? 'bg-top',
    'bg_repeat' => $design['background_image_repeat'] ?? 'bg-no-repeat',
    'bg_grayscale' => $design['bg_grayscale'] ?? false,
    'bg_blur' => $design['bg_blur'] ?? 'blur-none',
    'bg_fixed' => $design['bg_fixed'] ?? false,
    'bg_animation' => $design['animation'] ?? false,
    'bg_dark_mode' => $design['dark_mode_background_image'] ?? false,
    'bg_light_mode' => $design['background_image'] ?? false,
    'bg_height' => 'h-[900px]',
])

@if ($bg_is_active ?? false)

    {{-- Dark Mode Background --}}
    @if ($bg_dark_mode && $bg_light_mode)
        {{-- Dark Mode Background --}}
        <img alt="Dark Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} {{ $bg_height }} -z-50 hidden w-full object-cover dark:block"
            id="dark-background" src="{{ asset('storage/' . $bg_dark_mode) }}">
        <img alt="Light Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} {{ $bg_height }} -z-50 block w-full object-cover dark:hidden"
            id="dark-background" src="{{ asset('storage/' . $bg_light_mode) }}">
    @endif
    {{-- Light Mode Background --}}
    @if ($bg_light_mode && !$bg_dark_mode)
        <img alt="Light Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} {{ $bg_height }} -z-50 block w-full object-cover"
            id="default-background" src="{{ asset('storage/' . $bg_light_mode) }}">
    @endif

    {{-- Default Background --}}
    @if (!$bg_light_mode && !$bg_dark_mode)
        <img alt="Default Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} {{ $bg_height }} -z-50 block w-full object-cover"
            id="default-background" src="{{ asset('img/core/bg/saturn-ui-more-lights.png') }}">
    @endif

@endif
