@props(['hero'])

<section>
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="animate__animated animate__fadeInUp animate max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                {!! $hero->hero['section_title'] !!}
            </h1>
            <p
                class="animate__animated animate__fadeInUp animate__delay-2s  max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl">
                {!! $hero->hero['section_subtitle'] !!}</p>

            <div class="animate__animated animate__fadeInUp animate__delay-3s z-10 flex gap-4">

                {{-- Hero Section Button --}}
                @foreach ($hero->hero['buttons'] as $button)
                <a target="{{ $button['button_target'] }}" href="{{ $button['button_url'] }}">
                    @if ($button['button_style'] == 'filled')
                    <x-ui.button class="px-5 py-3">
                        {{ $button['button_title'] }}
                        @if( $button['button_target'] == '_blank')
                        <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                        @endif
                    </x-ui.button>
                    @else
                    <x-ui.button-alt class="px-5 py-3">
                        {{ $button['button_title'] }}
                        @if( $button['button_target'] == '_blank')
                        <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                        @endif
                    </x-ui.button-alt>
                    @endif
                </a>
                @endforeach
            </div>

        </div>
        <div class="hidden animate__animated animate__fadeInUp lg:mt-0 lg:col-span-5 lg:flex">
            {{-- Hero Section: Image --}}
            @isset($hero->hero['featured_image'])
            <div class="mt-8" id="hero-featured-image">
                <img class="animate__animated animate__fadeInUp animate__delay-1s h-auto p-4 lg:max-h-max"
                    src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
            </div>
            @endisset
        </div>
    </div>
</section>