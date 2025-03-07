@props(['hero', 'icon' => null])

<section>
    <div class="text-center">
        @if ($hero->hero['section_title'])
            <h1
                class="animate__animated animate__fadeInUp animate mb-4 max-w-5xl text-4xl font-extrabold leading-none tracking-tighter dark:text-white md:text-5xl lg:text-7xl">
                {!! $hero->hero['section_title'] !!}
            </h1>
        @endif

        @if ($hero->hero['section_subtitle'])
            <h2
                class="animate__animated animate__fadeInUp animate__delay-1s mb-6 text-lg leading-tight tracking-tight shadow-current lg:text-xl">
                {!! $hero->hero['section_subtitle'] !!}
            </h2>
        @endif

        {{-- Hero Section: Buttons --}}
        <div class="animate__animated animate__fadeInUp animate__delay-2s z-10 flex justify-center gap-4">

            {{-- Hero Section Button --}}
            @foreach ($hero->hero['buttons'] as $button)
                <a target="{{ $button['button_target'] ?? '_self' }}" href="{{ $button['button_url'] ?? '#' }}">
                    @if ($button['button_style'] == 'filled')
                        <x-ui.button :icon="$button['icon']" class="px-5 py-3">
                            {{ $button['button_title'] }}
                            @if ($button['button_target'] == '_blank')
                                <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                            @endif
                        </x-ui.button>
                    @else
                        <x-ui.button-alt :icon="$button['icon']" class="px-5 py-3">
                            {{ $button['button_title'] }}
                            @if ($button['button_target'] == '_blank')
                                <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                            @endif
                        </x-ui.button-alt>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
    </div>
    @if (data_get($hero, 'hero.featured_image_is_active'))
        <div class="animate__animated animate__fadeInUp animate__delay-2s hidden lg:col-span-5 lg:mt-0 lg:flex">
            {{-- Hero Section: Image --}}
            @if (data_get($hero, 'hero.featured_image'))
                <div class="mx-auto mt-8" id="hero-featured-image">
                    <img class="mx-auto mt-8 rounded-2xl bg-secondary-300 bg-opacity-20 p-2 shadow-lg dark:shadow-secondary-500"
                        src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
                @else
                    <img class="mx-auto mt-8 rounded-2xl bg-secondary-300 bg-opacity-20 p-2 shadow-lg dark:shadow-secondary-500"
                        src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="hero-section-image" />
            @endif
        </div>
    @endif
    </div>
    </div>

</section>
