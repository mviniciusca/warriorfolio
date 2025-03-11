@props(['hero'])

{{-- Hero Section: Sierra Theme --}}

<section class="sierra-theme" id="sierra-theme">
    <div
        class="{{ $hero->hero['is_mailing_active'] ? 'items-start' : 'items-center' }} mx-auto grid max-w-screen-xl gap-8 lg:grid-cols-2">

        <div class="mr-auto place-self-center lg:col-span-1">

            <h1
                class="animate__animated animate__fadeInUp animate {{ $hero->hero['bg_image'] && ($hero->hero['is_highlight'] ?? null) ? 'bg-white dark:bg-black px-2' : '' }} mb-4 max-w-xl text-3xl font-extrabold leading-none tracking-tighter dark:text-white md:text-4xl xl:text-5xl">
                {!! $hero->hero['section_title'] !!}
            </h1>

            <span
                class="animate__animated animate__fadeInUp animate__delay-1s {{ $hero->hero['bg_image'] && ($hero->hero['is_highlight'] ?? null) ? 'bg-white dark:bg-black p-2' : '' }} mb-6 max-w-2xl md:text-lg lg:mb-8 lg:text-xl">
                {!! $hero->hero['section_subtitle'] !!}
            </span>

            <div class="animate__animated animate__fadeInUp animate__delay-1s z-10 mt-8 flex gap-4">

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
                <div class="animate__animated animate__slideInDown max-w-80 py-4">
                    <p class="py-4 text-base">{{ __('Join your mailing list.') }}</p>
                    @livewire('newsletter')
                </div>
            @endif

        </div>
        {{-- Hero Section: Featured Image --}}
        @if (data_get($hero, 'hero.featured_image_is_active'))
            <div class="animate__animated animate__fadeInUp flex justify-center lg:col-span-1">
                @if (data_get($hero, 'hero.featured_image'))
                    <div class="mt-8 flex items-center" id="hero-featured-image">
                        <img class="rounded-lg lg:max-h-max"
                            src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
                    @else
                        <img class="rounded-lg lg:max-h-max"
                            src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="hero-section-image" />
                @endif
            </div>
        @endif
    </div>
    </div>
    </div>

</section>
