{{--

Core Component: About Section
----------------------------------------------------------------
This component is responsible for rendering the about section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\About\Section.php

--}}

@props([
    'module' => $data->module->about ?? null,
    'profile' => $data->user->profile ?? null,
    'courses' => null,
    'sliders' => null,
    'with_padding' => true,
    'button_header' => null,
    'button_url' => null,
    'is_filled' => $data->layout->about['section_fill'] ?? false,
    'is_section_filled_inverted' => $data->layout->about['is_section_filled_inverted'] ?? false,
    'is_heading_visible' => $data->layout->about['is_heading_visible'] ?? true,
])

@if ($data->module->about ?? false)

    <x-core.layout :$button_header :$button_url :$is_filled :$is_section_filled_inverted :$with_padding
        :module_name="'about'">

        @if ($is_heading_visible)
            @if ($data->layout->about['section_title'] ?? false)
                <x-slot name="module_title">
                    {!! $data->layout->about['section_title'] ?? null !!}
                </x-slot>
            @endif
            @if ($data->layout->about['section_subtitle'] ?? false)
                <x-slot name="module_subtitle">
                    {!! $data->layout->about['section_subtitle'] ?? null !!}
                </x-slot>
            @endif
        @endif

        <div class="my-12 flex flex-wrap" id="about-section-wrapper">
            {{-- Profile Section --}}
            <div class="w-full p-4 text-center lg:w-1/4 lg:p-8" id="profile">
                <x-about.profile :$is_section_filled_inverted :$profile />
            </div>
            {{-- About Section --}}
            <div class="about-you-section w-full p-8 text-sm leading-loose md:w-2/3 lg:w-2/4 lg:px-16">
                <div class="profile-course-header mb-8 flex items-center gap-2 text-sm font-semibold"
                    id="profile-course-header">
                    <x-ui.ionicon :icon="'rocket-sharp'" />
                    {{ __('Bio') }}
                </div>
                {!! $profile->about !!}
                {{-- Empty Section --}}
                @if (!$profile->about)
                    <x-ui.empty-section :auth="'Update your Bio'" />
                @endif
            </div>
            {{-- Courses and Graduations Section --}}
            <div class="w-full p-4 text-sm md:w-1/3 lg:w-1/4 lg:p-8" id="courses-and-graduations">
                <x-about.courses :$courses />
            </div>
        </div>
        {{-- Core: Slider --}}
        <x-hero.slider :$sliders />
    </x-core.layout>

@endif
