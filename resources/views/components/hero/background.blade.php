{{-- Application Background --}}
@if($background->background_image_visibility)
<div class="-mt-36 m-auto left-0 right-0 bg-hero
 animate__animated animate__fadeIn animate__delay-1s
 w-full h-[900px] absolute -z-20
 {{ $background->background_image_size }}
 {{ $background->background_image_position }}
 {{ $background->background_image_repeat }}"
    style="background-image: url('{{ $background->background_image ? asset('storage/' .  $background->background_image) : asset('img/core/bg-default.jpg') }}')">
</div>
<div
    class="w-full -left-1 h-[200px] absolute  mx-auto -mt-10 -z-10 right-0 bottom-0 bg-secondary-50 dark:bg-secondary-900">
</div>
@endif
{{-- Application Background --}}
