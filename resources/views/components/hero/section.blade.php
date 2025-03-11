{{-- Core Module: Hero Section --}}

@if ($module->hero)
{{-- Hero Section Background --}}
<x-hero.background :hero='$hero' />
{{-- Hero Section --}}
<x-core.layout :with_padding="false" :is_filled="false">
    <section class="hero-section-section py-6 md:py-12 lg:py-24">
        <div class="{{ $hero->hero['bumper_is_center'] ?
        'mx-auto flex flex-col items-center justify-center' : ''
        }}">

            {{-- Info Bumper --}}
            <x-ui.info-bumper :is_active="$hero->hero['bumper_is_active']"
                :is_animated="$hero->hero['bumper_is_animated']" :bumper_icon="$hero->hero['bumper_icon']"
                :bumper_title="$hero->hero['bumper_title']" :bumper_tag="$hero->hero['bumper_tag']"
                :is_center="$hero->hero['bumper_is_center']" :bumper_link="$hero->hero['bumper_link']"
                :bumper_target="$hero->hero['bumper_target']" :bumper_role="$hero->hero['bumper_role']" />

            {{-- Theme --}}
            @if ($hero->hero['theme'])
            @php
            $themeName = $hero->hero['theme'] ?? 'default';
            @endphp
            <x-dynamic-component :component="'themes.hero.' . $themeName . '-theme'" :$hero />
            @endif

            {{-- Static Slider --}}
            @if (data_get($hero, 'hero.slider_is_active'))
            <div class="mx-auto mt-8 flex w-full flex-wrap justify-center gap-4 md:justify-around lg:mt-12">
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
