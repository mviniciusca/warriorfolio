@if ($module->hero)

    <x-core.layout :with_padding="false">
        {{-- Background Module --}}
        <x-hero.background :hero='$hero' />
        {{-- Hero Section --}}
        <section>
            <div class="mx-auto flex flex-col items-center justify-center">
                {{-- Hero Section Themes --}}
                @if ($hero->hero['theme'] === 'default')
                    <x-themes.hero.default-theme :$hero />
                @elseif($hero->hero['theme'] === 'sierra')
                    <x-themes.hero.sierra-theme :$hero />
                @endif
                {{-- Static Slider --}}
                @if (data_get($hero, 'hero.slider_is_active'))
                    <div class="mx-auto mb-12 mt-4 flex max-w-7xl flex-wrap justify-around gap-4">
                        @foreach (collect($hero->hero['slider_content'])->flatten(1) as $item)
                            <img class="{{ $hero->hero['is_invert'] ? 'dark:invert' : null }} px-4 opacity-50 transition-all duration-100 hover:opacity-100"
                                src=" {{ asset('storage/' . $item['slider_image']) }}" />
                        @endforeach
                    </div>
                @endif
                {{-- Hero Section Slider --}}
                <x-hero.slider :$sliders />
            </div>
        </section>
    </x-core.layout>

@endif
