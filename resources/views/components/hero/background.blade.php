{{-- Hero Background --}}
@if($info->hero_is_bg_visible)
<div id="hero-background-image"
    class="m-auto bg-hero animate__animated animate__fadeIn animate__delay-1s w-full h-[600px] absolute -z-50 {{ $info->hero_section_bg_size . ' ' . $info->hero_section_bg_position . ' ' . $info->hero_section_bg_repeat }}"
    style="background-image: url('{{ asset('storage/' .  $info->hero_section_bg_image) }}')">
</div>
@endif
{{-- Hero Background --}}
