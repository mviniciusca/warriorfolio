{{-- Hero Background --}}
@if($info->background_image_visibility)
<div id="home" class="-mt-36 {{ $info->background_image ? '' : 'animate-pulse' }} m-auto left-0 right-0 bg-hero animate-opacity opacity-5 bg-fixed
 w-full h-[1080px] absolute -z-20
 {{ $info->background_image_size . ' ' . $info->background_image_position . ' '
 . $info->background_image_repeat }}
 "
    style="background-image: url('{{ $info->background_image ? asset('storage/' .  $info->background_image) : asset('img/core/blur-bg.png') }}')">
</div>
@endif
{{-- Hero Background --}}
