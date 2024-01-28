{{-- Hero Background --}}
@if($info->hero_is_bg_visible)
<div id="home" class="m-auto left-0 right-0 bg-hero
 animate__animated animate__fadeIn animate__delay-1s
 w-full h-[800px] absolute -z-20
 {{ $info->hero_section_bg_size . ' ' . $info->hero_section_bg_position . ' '
 . $info->hero_section_bg_repeat }}
 "
    style="background-image: url('{{ $info->hero_section_bg_image ? asset('storage/' .  $info->hero_section_bg_image) : asset('img/core/bg-default.png') }}')">
</div>
@endif
{{-- Hero Background --}}
