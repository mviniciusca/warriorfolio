{{--

Main Background Component
----------------------------------------------------------------
This component is used to display the background image of the page.

Important: When visibility is set to true, the background image will be displayed. Even without a uploaded image, a
default image will be displayed.

--}}

@if (data_get($design, 'background_image_visibility') === true)
    @if (data_get($design, 'background_image'))
        <div id="default-background" class="{{ $design['background_image'] ? '' : 'animate-pulse' }} {{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} {{ $design['background_image_size'] .
                    ' ' .
                    $design['background_image_position'] .
                    ' ' .
                    $design['background_image_repeat'] }} absolute -z-50 -mt-52 h-[1080px] w-full"
            style="background-image: url('{{ asset('storage/' . $design['background_image']) }}')">
        </div>
    @else
        <div id="default-background"
            class="{{ $design['animation'] ? 'animate-opacity opacity-10' : '' }} absolute -z-50 -mt-52 h-[1080px] w-full bg-auto bg-scroll bg-center bg-no-repeat"
            style="background-image: url('{{ asset('img/core/demo/default-bg.png') }}')">
        </div>
    @endif
@endif
