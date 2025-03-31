@props(['hero'])

@if (data_get($hero, 'hero.slider_is_active'))
    <div
        class="mx-auto max-w-7xl py-8 animate__animated animate__fadeInUp animate__delay-1s flex w-full flex-wrap justify-center gap-4 md:justify-around lg:mt-8 {{ ($hero->hero['is_filled'] ?? false) ? 'lg:mb-24 md:mb-12 mb-6' : 'mb-1' }}">
        @foreach (collect($hero->hero['slider_content'])->flatten(1) as $item)
            <img class="{{ $hero->hero['is_invert'] ? 'dark:invert' : null }} max-h-8 px-4 opacity-90 transition-all duration-100 hover:opacity-100 md:max-h-14"
                src=" {{ asset('storage/' . $item['slider_image']) }}" />
        @endforeach
    </div>
@endif
