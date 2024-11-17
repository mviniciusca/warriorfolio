@isset($design['background_image_visibility'])

<div id="default-background"
    class="{{ $design['background_image'] ? '' : 'animate-pulse' }} w-full h-[1200px] absolute -z-50 -mt-36 animate-opacity opacity-5
 {{ $design['background_image_size'] . ' ' . $design['background_image_position'] . ' ' . $design['background_image_repeat'] }}"
    style="background-image: url('{{ asset('storage/' . $design['background_image']) }}')">
</div>

@endisset