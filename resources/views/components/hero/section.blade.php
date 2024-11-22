@if($module->hero)

<x-core.layout>
    {{-- Background Module --}}
    <x-hero.background :hero='$hero' />
    {{-- Hero Section --}}
    <section class="py-4">
        <div class="mx-auto max-w-7xl">
            <div class="container mx-auto flex flex-col items-center justify-center">

                <div class="max-w-7xl">
                    {{-- Hero Section Theme --}}
                    @if($hero->hero['theme'] === 'default')
                    <x-themes.hero.default-theme :$hero />
                    @endif

                    @if($hero->hero['theme'] === 'sierra')
                    <x-themes.hero.sierra-theme :$hero />
                    @endif


                    {{-- Static Slider --}}
                    @if($hero->hero['slider_is_active'])
                    <div class="flex flex-wrap justify-evenly gap-4">
                        @foreach (collect($hero->hero['slider_content'])->flatten(1) as $item)
                        <img class="{{ $hero->hero['is_invert'] ? 'dark:invert' : null }} opacity-50 hover:opacity-100 transition-all duration-100"
                            src=" {{ asset('storage/' . $item['slider_image']) }}" />
                        @endforeach
                    </div>
                    @endif

                    {{-- Hero Section Slider --}}
                    <x-hero.slider :$sliders />

                </div>
            </div>
        </div>
    </section>
</x-core.layout>
@endif