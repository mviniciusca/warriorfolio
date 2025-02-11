@props(['hero'])

<section class="sierra-theme" id="sierra-theme">
    <div
        class="{{ data_get($hero, 'hero.featured_image_is_active') ? 'lg:grid-cols-2 max-w-screen-xl ' : '' }} mx-auto grid">
        <div class="mr-auto place-self-center lg:col-span-1">
            <h1
                class="animate__animated animate__fadeInUp animate mb-4 max-w-2xl text-4xl font-extrabold leading-none tracking-tighter dark:text-white md:text-5xl xl:text-6xl">
                {!! $hero->hero['section_title'] !!}
            </h1>
            <p
                class="animate__animated animate__fadeInUp animate__delay-1s mb-6 max-w-2xl md:text-lg lg:mb-8 lg:text-xl">
                {!! $hero->hero['section_subtitle'] !!}</p>

            <div class="animate__animated animate__fadeInUp animate__delay-2s z-10 flex gap-4">

                {{-- Hero Section Button --}}
                @foreach ($hero->hero['buttons'] as $button)
                    <a target="{{ $button['button_target'] }}" href="{{ $button['button_url'] }}">
                        @if ($button['button_style'] == 'filled')
                            <x-ui.button class="px-5 py-3">
                                {{ $button['button_title'] }}
                                @if ($button['button_target'] == '_blank')
                                    <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                                @endif
                            </x-ui.button>
                        @else
                            <x-ui.button-alt class="px-5 py-3">
                                {{ $button['button_title'] }}
                                @if ($button['button_target'] == '_blank')
                                    <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                                @endif
                            </x-ui.button-alt>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Newsletter Module --}}
            @if (data_get($hero, 'hero.is_mailing_active') ?? true)
                <div class="animate__animated animate__slideInDown max-w-80 py-8">
                    <p class="py-4 text-base">{{ __('Join your mailing list.') }}</p>
                    @livewire('newsletter')
                </div>
            @endif

        </div>
        {{-- Hero Section: Featured Image --}}
        @if (data_get($hero, 'hero.featured_image_is_active'))
            <div class="animate__animated animate__fadeInUp hidden rounded-lg lg:col-span-1 lg:mt-0 lg:flex">
                @if (data_get($hero, 'hero.featured_image'))
                    <div class="mt-8" id="hero-featured-image">
                        <img class="animate__animated animate__fadeInUp h-auto p-4 lg:max-h-max"
                            src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
                    @else
                        <img class="animate__animated animate__fadeInUp mx-auto h-auto rounded-xl p-4 lg:max-h-max"
                            src="{{ asset('img/core/demo/app-demo.png') }}" alt="hero-section-image" />
                @endif
            </div>
    </div>
    </div>
    </div>
    @endif
</section>
