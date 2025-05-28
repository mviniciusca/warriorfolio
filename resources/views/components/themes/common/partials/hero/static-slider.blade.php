@props(['hero'])

<div
    class="mx-auto max-w-7xl py-4 animate__animated animate__fadeInUp animate__delay-1s flex w-full flex-wrap justify-center gap-4 md:justify-around lg:mt-8 {{ ($hero->content['is_filled'] ?? false) ? 'lg:mb-24 md:mb-12 mb-6' : 'mb-1' }}">
    @foreach ($hero->content['slider_content'] as $item)
    <img class="{{ $hero->content['is_invert'] ? 'dark:invert' : null }} max-h-8 px-4 opacity-90 transition-all duration-100 hover:opacity-100 md:max-h-14"
        src=" {{ asset('storage/' . $item['slider_image']) }}" />
    @endforeach
</div>
