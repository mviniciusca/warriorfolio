@props(['hero'])

<div class="text-center">
    @if($hero->hero['section_title'])
    <h1
        class="animate__animated animate__fadeInUp animate mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
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

    {{-- Hero Section: Image --}}
    @isset($hero->hero['featured_image'])
    <div class="mt-8 max-w-2xl justify-center mx-auto items-center hidden lg:flex" id="hero-featured-image">
        <img class="animate__animated animate__fadeInUp animate__delay-2s h-auto p-4 lg:max-h-max"
            src="{{ asset('storage/' . $hero->hero['featured_image']) }}" alt="hero-section-image" />
    </div>
    @endisset
    {{-- End Hero Section: Image --}}
</div>
</div>