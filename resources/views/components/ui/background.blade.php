@if($info->background_image_visibility)

<div id="default-background" class="{{ $info->background_image ? '' : 'animate-pulse' }} w-full h-[1200px] absolute -z-50 -mt-36 animate-opacity opacity-5
 {{ $info->background_image_size . ' ' . $info->background_image_position . ' ' . $info->background_image_repeat }}"
    style="background-image: url('{{ asset('storage/' . $info->background_image) }}')">
</div>

@endif
