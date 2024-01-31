{{-- Hero Background --}}
@if($info->background_image_visibility)
<div id="home" class="{{ $info->background_image ? '' : 'animate-pulse' }} bg-hero animate-opacity opacity-5
 w-full h-[1200px] filter grayscale absolute -z-50
 {{ $info->background_image_size . ' ' . $info->background_image_position . ' '
 . $info->background_image_repeat }}
 " style="background-image: url('{{ asset('storage/' . $info->background_image) }}')">
</div>
@endif
{{-- Hero Background --}}
