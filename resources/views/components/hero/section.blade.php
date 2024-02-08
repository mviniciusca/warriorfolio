@if($module->hero)
{{-- Background Module --}}
<x-hero.background :info='$info' />
{{-- Hero Section --}}
<section class="py-4">
    <div>
        <div class="mx-auto max-w-7xl">
            <div class="container mx-auto flex flex-col items-center justify-center">
                <div class="max-w-7xl text-center">

                    @if($info->hero_section_title)
                    <h1 class="hero-section-title text-gradient animate__animated animate__fadeInUp animate__delay-1s">
                        {!! $info->hero_section_title !!}
                    </h1>
                    @endif

                    @if($info->hero_section_subtitle_text)
                    <h4
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-lg leading-tight tracking-tight shadow-current lg:text-xl">
                        {!! $info->hero_section_subtitle_text !!}
                    </h4>
                    @endif

                    {{-- Hero Section: Buttons --}}
                    <div class="animate__animated animate__fadeInUp animate__delay-2s z-10 flex justify-center gap-4">
                        {{-- Hero Section Button --}}
                        @if($info->hero_section_button_text == true && $info->hero_section_button_url == true)
                        <a target="{{ $info->hero_button_link_target }}" href="{{ $info->hero_section_button_url }}">
                            <x-ui.button class="px-5 py-3">
                                {{ $info->hero_section_button_text }}
                            </x-ui.button>
                        </a>
                        @endif
                        {{-- Hero Section Alternative Button --}}
                        @if($info->hero_alt_button_text && $info->hero_alt_button_url)
                        <a target="{{ $info->hero_alt_button_link_target }}" href="{{ $info->hero_alt_button_url }}">
                            <x-ui.button-alt class="px-5 py-3">
                                {{ $info->hero_alt_button_text }}
                                @if($info->hero_alt_button_link_target == '_blank')
                                <ion-icon class="ml-1" name="trending-up-outline"></ion-icon>
                                @endif
                            </x-ui.button-alt>
                        </a>
                        @endif
                    </div>
                    {{-- End Hero Section: Buttons --}}
                </div>
                {{-- Hero Section: Image --}}
                @if($info->hero_section_image)
                <div class="mt-8" id="hero-featured-image">
                    <img class="animate__animated animate__fadeInUp animate__delay-2s h-auto p-4 lg:max-h-max"
                        src="{{ asset('storage/' . $info->hero_section_image)}}" alt="hero-section-image" />
                </div>
                @endif
                {{-- End Hero Section: Image --}}
            </div>
            {{-- Hero Section Slider --}}
            <x-hero.slider :$sliders />

        </div>
    </div>
</section>
@endif
