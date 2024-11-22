@if($module->hero)

<x-core.layout>
    {{-- Background Module --}}
    <x-hero.background :hero='$hero' />
    {{-- Hero Section --}}
    <section>
        <div class="mx-auto flex flex-col items-center justify-center">
            {{-- Hero Section Themes --}}
            @if($hero->hero['theme'] === 'default')
            <x-themes.hero.default-theme :$hero />
            @endif

            @if($hero->hero['theme'] === 'sierra')
            <x-themes.hero.sierra-theme :$hero />
            @endif

            {{-- Static Slider --}}
            @if(data_get($hero,'slider_is_active') ?? false)
            <div class="flex mb-16 mt-4 mx-auto flex-wrap justify-around gap-4">
                @foreach (collect($hero->hero['slider_content'])->flatten(1) as $item)
                <img class="{{ $hero->hero['is_invert'] ? 'dark:invert' : null }} opacity-50 hover:opacity-100 transition-all duration-100"
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