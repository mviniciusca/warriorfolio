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

@if (data_get($design, 'background_image_visibility') === true)
    @if (data_get($design, 'background_image'))
        <div class="{{ $design['background_image'] ?? '' }} {{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} {{ $design['background_image_size'] ?? 'bg-auto' }} {{ $design['background_image_position'] ?? 'bg-top' }} {{ $design['background_image_repeat'] ?? 'bg-no-repeat' }} {{ $design['bg_grayscale'] ? 'grayscale' : 'grayscale-0' }} {{ $design['bg_blur'] ?? '' }} {{ $design['bg_fixed'] ? 'bg-fixed' : 'bg-scroll' }} absolute -z-50 -mt-52 h-[1080px] w-full"
            id="default-background"
            style="background-image: url('{{ asset('storage/' . $design['background_image']) }}')">
        </div>
    @else
        <div class="{{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} absolute -z-50 -mt-52 h-[1080px] w-full animate-pulse bg-auto bg-scroll bg-center bg-no-repeat blur-xl -hue-rotate-60 backdrop-filter"
            id="default-background"
            style="background-image: url('{{ asset('img/core/bg/saturn-ui-more-lights.png') }}')">
        </div>
    @endif
@endif
