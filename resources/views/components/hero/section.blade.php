@if ($module->hero)
    {{-- Hero Section Background --}}
    <x-hero.background :hero='$hero' />

    {{-- Hero Section --}}
    <x-core.layout :with_padding="false" :is_filled="false">
        <section class="hero-section-section py-6 md:py-12 lg:py-24">
            <div class="mx-auto flex flex-col items-center justify-center">

                {{-- Theme --}}
                @if ($hero->hero['theme'])
                    @php
                        $themeName = $hero->hero['theme'] ?? 'default';
                    @endphp
                    <x-dynamic-component :component="'themes.hero.' . $themeName . '-theme'" :$hero />
                @endif

                {{-- Static Slider --}}
                @if (data_get($hero, 'hero.slider_is_active'))
                    <div class="mx-auto flex w-full flex-wrap justify-center gap-4 md:justify-around">
                        @foreach (collect($hero->hero['slider_content'])->flatten(1) as $item)
                            <img class="{{ $hero->hero['is_invert'] ? 'dark:invert' : null }} max-h-8 px-4 opacity-60 transition-all duration-100 hover:opacity-100 md:max-h-14"
                                src=" {{ asset('storage/' . $item['slider_image']) }}" />
                        @endforeach
                    </div>
                @endif

                {{-- Core: Dynamic Slider --}}
                <x-hero.slider :$sliders />
            </div>
        </section>
    </x-core.layout>
@endif
