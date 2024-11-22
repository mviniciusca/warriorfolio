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
                    <div class="flex flex-wrap justify-evenly gap-4">
                        @foreach ($hero->hero['slider_content'] as $item )
                        @foreach ($item as $item )
                        <img class="dark:invert" src="{{ asset('storage/' . $item['slider_image'] ) }}" />
                        @endforeach
                        @endforeach
                    </div>

                    {{-- Hero Section Slider --}}
                    <x-hero.slider :$sliders />

                </div>
            </div>
        </div>
    </section>
</x-core.layout>
@endif