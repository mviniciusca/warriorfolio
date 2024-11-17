{{-- Hero Background --}}
@if($hero->hero['is_active'])
<div id="hero-background-image"
    class="m-auto bg-hero animate__animated animate__fadeIn animate__delay-1s w-full h-[600px] absolute -z-50 {{ $hero->hero['bg_size'] . ' ' . $hero->hero['bg_position'] . ' ' . $hero->hero['bg_repeat'] }}"
    style="background-image: url('{{ asset('storage/' .  $hero->hero['bg_image']) }}')">
</div>
@endif
{{-- Hero Background --}}