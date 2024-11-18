@if(data_get($design,'background_image_visibility') === true)
@if(data_get($design,'background_image'))
<div id="default-background" class="
w-full h-[1080px] absolute -z-50 -mt-36
{{ $design['background_image'] ? '' : 'animate-pulse' }}
{{ $design['animation'] ? 'animate-opacity opacity-10' : null }}
{{ $design['background_image_size'] . ' ' . 
        $design['background_image_position'] . ' ' . $design['background_image_repeat'] }}"
    style="background-image: url('{{ asset('storage/' . $design['background_image']) }}')">
</div>
@else
<div id="default-background"
    class="w-full h-[1080px] animate-opacity opacity-10 absolute -z-50 -mt-36 bg-no-repeat bg-center bg-scroll bg-auto"
    style="background-image: url('{{ asset('img/core/bg/astro-default-bg.png') }}')">
</div>
@endif
@endif