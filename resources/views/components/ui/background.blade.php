{{--

Core: Main Background Component
----------------------------------------------------------------
This component is used to display the background image of the page.

Important: When visibility is set to true, the background image will be displayed. Even without a uploaded image, a
default image will be displayed.

--}}

@props([
    'design' => null,
])

@if ($design['background_image_visibility'] ?? false)

    <div
        class="absolute -z-50 -mt-12 h-[1080px] w-full bg-gradient-to-b from-gray-900/50 via-transparent to-gray-900/50 dark:from-gray-800/50 dark:via-transparent dark:to-gray-800/50">
    </div>
    <div
        class="absolute bottom-0 -z-40 -mb-10 h-96 w-full bg-gradient-to-b from-transparent via-white to-white dark:via-secondary-950 dark:to-secondary-950">
    </div>

    @if (($design['background_image'] ?? false) || ($design['dark_mode_background_image'] ?? false))
        @if ($design['dark_mode_background_image'] ?? false)
            <img alt="Dark Mode Background"
                class="{{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} {{ $design['background_image_size'] ?? 'bg-auto' }} {{ $design['background_image_position'] ?? 'bg-top' }} {{ $design['background_image_repeat'] ?? 'bg-no-repeat' }} {{ $design['bg_grayscale'] ? 'grayscale' : 'grayscale-0' }} {{ $design['bg_blur'] ?? '' }} {{ $design['bg_fixed'] ? 'fixed' : 'absolute' }} -z-50 -mt-12 hidden h-[1080px] w-full object-cover dark:block"
                id="dark-background" src="{{ asset('storage/' . $design['dark_mode_background_image']) }}">
        @endif
        @if ($design['background_image'] ?? false)
            <img alt="Light Mode Background"
                class="{{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} {{ $design['background_image_size'] ?? 'bg-auto' }} {{ $design['background_image_position'] ?? 'bg-top' }} {{ $design['background_image_repeat'] ?? 'bg-no-repeat' }} {{ $design['bg_grayscale'] ? 'grayscale' : 'grayscale-0' }} {{ $design['bg_blur'] ?? '' }} {{ $design['bg_fixed'] ? 'fixed' : 'absolute' }} -z-50 -mt-12 block h-[1080px] w-full object-cover dark:hidden"
                id="default-background" src="{{ asset('storage/' . $design['background_image']) }}">
        @endif
    @else
        <img alt="Default Background"
            class="{{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} absolute -z-50 -mt-52 h-[1080px] w-full animate-pulse bg-auto bg-scroll bg-center bg-no-repeat object-cover blur-xl backdrop-filter"
            id="default-background" src="{{ asset('img/core/bg/saturn-ui-more-lights.png') }}">
    @endif

@endif
