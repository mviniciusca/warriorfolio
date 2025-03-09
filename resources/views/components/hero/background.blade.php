{{-- Hero Background --}}
@if ($hero->hero['is_active'])
    <div id="hero-background-image"
        class="bg-hero animate__animated animate__fadeIn animate__delay-1s {{ $hero->hero['bg_size'] . ' ' . $hero->hero['bg_position'] . ' ' . $hero->hero['bg_repeat'] }} absolute -z-50 m-auto h-[600px] w-full"
        style="background-image: url('{{ asset('storage/' . $hero->hero['bg_image']) }}')">
    </div>
@endif
{{-- Hero Background --}}
