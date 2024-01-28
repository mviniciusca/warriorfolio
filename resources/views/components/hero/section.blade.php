@if($module->hero)
{{-- Background Module --}}
<x-hero.background :info='$info' />
{{-- Hero Section --}}
<section class="py-12">
    <div class="px-4 py-4 md:py-12">
        <div class="mx-auto max-w-7xl">
            <div class="container mx-auto flex flex-col items-center justify-center px-5 py-8">
                <div class="mt-2 max-w-7xl text-center">
                    @if($info->hero_section_title)
                    <h1 class="hero-section-title text-gradient animate__animated animate__fadeInUp animate__delay-1s">
                        {!! $info->hero_section_title !!}
                    </h1>
                    @endif
                    @if($info->hero_section_subtitle_text)
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-2xl leading-tight tracking-tight shadow-current">
                        {!! $info->hero_section_subtitle_text !!}
                    </p>
                    @endif
                    {{-- Hero Section: Buttons --}}
                    <div class="animate__animated animate__fadeInUp animate__delay-2s z-10 flex justify-center gap-4">
                        {{-- Hero Section Button --}}
                        @if($info->hero_section_button_text == true && $info->hero_section_button_url == true)
                        <a target="{{ $info->hero_button_link_target }}" href="{{ $info->hero_section_button_url }}">
                            <button
                                class="inline-flex items-center rounded-md border border-secondary-600 border-opacity-60 bg-primary-500 px-6 py-2 align-middle text-lg text-secondary-50 transition-all duration-100 hover:opacity-80 focus:outline-none active:opacity-25">
                                {{ $info->hero_section_button_text }}
                            </button>
                        </a>
                        @endif
                        {{-- Hero Section Alternative Button --}}
                        @if($info->hero_alt_button_text && $info->hero_alt_button_url)
                        <a target="{{ $info->hero_alt_button_link_target }}" href="{{ $info->hero_alt_button_url }}">
                            <button
                                class="dark: inline-flex items-center rounded-md border border-secondary-600 border-opacity-60 bg-transparent px-6 py-2 align-middle text-lg text-secondary-700 transition-all duration-100 hover:bg-primary-500 hover:text-secondary-50 hover:opacity-90 focus:outline-none active:opacity-25 dark:text-secondary-50">
                                {{ $info->hero_alt_button_text }}
                            </button>
                        </a>
                        @endif
                    </div>
                    {{-- End Hero Section: Buttons --}}
                </div>
                {{-- Hero Section: Image --}}
                @if($info->hero_section_image)
                <div class="mt-8 rounded-xl" id=" hero-featured-image">
                    <img class="animate__animated animate__fadeInUp animate__delay-2s rounded-t-2xl"
                        src="{{ asset('storage/' . $info->hero_section_image)}}" alt="hero-section-image" />
                </div>
                @endif
                {{-- End Hero Section: Image --}}
            </div>
            {{-- Hero Section Slider --}}
            <div class="z-10 -mt-8">
                <x-hero.slider />
            </div>
        </div>
    </div>
</section>
@endif
