@if($module->about)
<x-core.layout class="{{ $info->about_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="about">

    @if($info->about_section_title)
    <x-slot name="module_title">
        {!! $info->about_section_title !!}
    </x-slot>
    @endif

    @if($info->about_section_subtitle_text)
    <x-slot name="module_subtitle">
        {!! $info->about_section_subtitle_text !!}
    </x-slot>
    @endif

    <div class="mt-4 flex flex-wrap lg:mt-12" id="about-you-module">

        {{-- Profile Section --}}
        <div class="w-full p-4 text-center lg:w-1/4 lg:p-8" id="profile">
            <x-about.profile :$profile />
        </div>

        {{-- About Section --}}
        <div class="w-full p-4 leading-loose md:w-2/3 lg:w-2/4 lg:p-8" id="about-you">
            {!! $profile->about !!}

            @if(!$profile->about)
            <x-ui.empty-section :auth="'Go to your Dashboard and create a New About.'" />
            @endif

        </div>

        {{-- Courses and Graduations Section --}}
        <div class="w-full p-4 md:w-1/3 lg:w-1/4 lg:p-8" id="courses-and-graduations">
            <x-about.courses :$courses />
        </div>

    </div>

    <x-hero.slider :$sliders />
</x-core.layout>
@endif
