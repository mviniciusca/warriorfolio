@props(['hero'])

<section>
    <div class="text-center">
        @if($hero->hero['section_title'])
        <h1
            class="animate__animated animate__fadeInUp animate max-w-2xl mb-4 text-4xl font-extrabold tracking-tighter leading-none md:text-5xl xl:text-6xl dark:text-white">
            {!! $hero->hero['section_title'] !!}
        </h1>
        @endif

        @if($hero->hero['section_subtitle'])
        <h4
            class="animate__animated animate__fadeInUp animate__delay-1s mb-8 text-lg leading-tight tracking-tight shadow-current lg:text-xl">
            {!! $hero->hero['section_subtitle'] !!}
        </h4>
        @endif

        {{-- Hero Section: Buttons --}}
        <div class="animate__animated animate__fadeInUp animate__delay-2s z-10 flex justify-center gap-4">

            {{-- Hero Section Button --}}
            @foreach ($hero->hero['buttons'] as $button)
            <a target="{{ $button['button_target'] ?? '_self' }}" href="{{ $button['button_url'] ?? '#' }}">
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
    </div>

    <div class="hidden animate__animated animate__fadeInUp lg:mt-0 lg:col-span-5 lg:flex">
        {{-- Hero Section: Image --}}
        @if(data_get($hero,'hero.featured_image'))
        <div class="mt-8" id="hero-featured-image">
            <img class="animate__animated animate__fadeInUp animate__delay-2s h-auto p-4 lg:max-h-max"
                src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
            @else
            <img class="animate__animated animate__fadeInUp animate__delay-3s p-4 lg:max-h-max h-auto"
                src="{{ asset('img/core/demo/app-demo.png') }}" alt="hero-section-image" />
            @endif
        </div>
    </div>
    </div>

</section>