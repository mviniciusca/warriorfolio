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
])

@if ($bg_is_active ?? false)

    {{--  Overlay --}}
    <div
        class="absolute -z-50 -mt-12 h-[1080px] w-full bg-gradient-to-b from-gray-900/50 via-transparent to-gray-900/50 dark:from-gray-800/50 dark:via-transparent dark:to-gray-800/50">
    </div>
    <div
        class="absolute bottom-0 -z-40 -mb-10 h-96 w-full bg-gradient-to-b from-transparent via-white to-white dark:via-secondary-950 dark:to-secondary-950">
    </div>

    {{-- Dark Mode Background --}}
    @if ($bg_dark_mode)
        <img alt="Dark Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} -z-50 -mt-12 hidden h-[1080px] w-full object-cover dark:block"
            id="dark-background" src="{{ asset('storage/' . $bg_dark_mode) }}">
        <img alt="Light Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} -z-50 -mt-12 block h-[1080px] w-full object-cover dark:hidden"
            id="dark-background" src="{{ asset('storage/' . $bg_light_mode) }}">
    @endif
    {{-- Light Mode Background / Default Background --}}
    @if ($bg_light_mode && !$bg_dark_mode)
        <img alt="Light Mode Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} {{ $bg_size }} {{ $bg_position }} {{ $bg_repeat }} {{ $bg_grayscale ? 'grayscale' : 'grayscale-0' }} {{ $bg_blur }} {{ $bg_fixed ? 'fixed' : 'absolute' }} -z-50 -mt-12 block h-[1080px] w-full object-cover"
            id="default-background" src="{{ asset('storage/' . $bg_light_mode) }}">
    @else
        <img alt="Default Background"
            class="{{ $bg_animation ? 'animate-opacity opacity-10' : '' }} absolute -z-50 -mt-52 h-[1080px] w-full animate-pulse bg-auto bg-scroll bg-center bg-no-repeat object-cover blur-xl backdrop-filter"
            id="default-background" src="{{ asset('img/core/bg/saturn-ui-more-lights.png') }}">
    @endif

@endif
