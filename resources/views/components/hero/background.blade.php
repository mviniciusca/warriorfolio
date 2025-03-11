{{-- Hero Background --}}



@if ($hero->hero['is_active'])
    @if ($hero->hero['is_pattern_bg'])
        <div id="hero-background-image"
            class="{{ $hero->hero['bg_size'] ?? 'bg-cover' }} {{ $hero->hero['bg_position'] ?? 'bg-center' }} {{ $hero->hero['bg_repeat'] ?? 'bg-no-repeat' }} bg-hero absolute -z-50 m-auto h-[600px] w-full bg-fixed opacity-5 filter dark:invert"
            style="background-image: url('{{ asset('img/core/core-ui-elements/patterns/' . ($hero->hero['pattern_name'] ?? 'cross') . '.svg') }}')">
        </div>
    @elseif ($hero->hero['bg_image'] ?? false)
        <div id="hero-background-image"
            class="{{ $hero->hero['bg_size'] ?? 'bg-cover' }} {{ $hero->hero['bg_position'] ?? 'bg-center' }} {{ $hero->hero['bg_repeat'] ?? 'bg-no-repeat' }} bg-hero absolute -z-50 m-auto h-[600px] w-full"
            style="background-image: url('{{ asset('storage/' . $hero->hero['bg_image']) }}')">
        </div>
    @endif
@endif
