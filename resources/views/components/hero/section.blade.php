{{-- Core Module: Hero Section --}}

@if ($module->hero)
    {{-- Hero Section Background --}}
    <x-hero.background :hero='$hero' />
    {{-- Hero Section --}}
    <x-core.layout :module_name="'hero-section'" :with_padding="false" :is_filled="$hero->hero['is_filled'] ?? false">
        <section class="hero-section-section py-8">
            <div class="{{ ($hero->hero['bumper_is_center'] ?? false) ?
            'mx-auto flex flex-col items-center justify-center' : ''
                                                                            }}">



                {{-- Theme --}}
                @if ($hero->hero['theme'])
                        @php
                            $themeName = $hero->hero['theme'] ?? 'default';
                        @endphp
                        <x-dynamic-component :component="'themes.hero.' . $themeName . '-theme'" :$hero />
                @endif

                {{-- Static Slider --}}
                @if (data_get($hero, 'hero.slider_is_active'))
                    <div
                        class="mx-auto mt-4 flex w-full flex-wrap justify-center gap-4 md:justify-around lg:mt-6 {{ ($hero->hero['is_filled'] ?? false) ? 'lg:mb-24 md:mb-12 mb-6' : 'mb-1' }}">
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
