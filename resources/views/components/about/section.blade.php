@if($module->about)
<x-core.layout class="{{ $info->about_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="about">
    @if($info->about_section_title)
    <div class="header-title mb-2">
        {!! $info->about_section_title !!}
    </div>
    @endif
    @if($info->about_section_subtitle_text)
    <div class="mx-auto mt-4 max-w-2xl text-center text-lg">
        {!! $info->about_section_subtitle_text !!}
    </div>
    @endif
    <section class="mt-24 flex" id="about-you-module">

        {{-- Profile Section --}}
        <section class="w-full p-8 text-center md:w-1/4" id="profile">
            <x-about.profile :$profile />
        </section>

        {{-- About Section --}}
        <section class="text-md w-full p-12 leading-loose md:w-2/4" id="about-you">
            {!! $profile->about !!}

            @if(!$profile->about)
            <x-ui.empty-section :auth="'Go to your Dashboard and create a New About.'" />
            @endif

        </section>

        {{-- Courses and Graduations Section --}}
        <section class="w-full p-12 md:w-2/4" id="courses-and-graduations">
            <x-about.courses :$courses />
        </section>

    </section>
</x-core.layout>
@endif
