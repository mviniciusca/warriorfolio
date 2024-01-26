{{-- Application Background --}}
@if($background->background_image_visibility)
<div id="home" class="-mt-36 m-auto left-0 right-0 bg-hero
 animate__animated animate__fadeIn animate__delay-1s
 w-full h-[900px] absolute -z-20
 {{ $background->background_image_size . ' ' . $background->background_image_position . ' '
 . $background->background_image_repeat }}
 "
    style="background-image: url('{{ $background->background_image ? asset('storage/' .  $background->background_image) : asset('img/core/bg-default.png') }}')">
</div>

@endif
{{-- Application Background --}}
