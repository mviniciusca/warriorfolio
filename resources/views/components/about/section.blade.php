@props([
'with_padding' => true,
'is_filled' => $data->about['section_fill'] ?? false,
'button_header' => null,
'button_url' => null,
])

@if ($module->about)
<x-core.layout :$with_padding :$is_filled :$button_header :$button_url :module_name="'about'">

    @if ($data->about['section_title'])
    <x-slot name="module_title">
        {!! $data->about['section_title'] !!}
    </x-slot>
    @endif

    @if ($data->about['section_subtitle'])
    <x-slot name="module_subtitle">
        {!! $data->about['section_subtitle'] !!}
    </x-slot>
    @endif

    <div class="flex flex-wrap lg:mt-12" id="about">

        {{-- Profile Section --}}
        <div class="w-full p-4 text-center lg:w-1/4 lg:p-8" id="profile">
            <x-about.profile :$profile />
        </div>

        {{-- About Section --}}
        <div class="about-you-section w-full p-4 leading-relaxed md:w-2/3 lg:w-2/4 lg:p-8" id="about-you">
            {!! $profile->about !!}

            @if (!$profile->about)
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
