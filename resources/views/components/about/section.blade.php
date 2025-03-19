@props([
'with_padding' => true,
'is_filled' => $data->about['section_fill'] ?? false,
'button_header' => null,
'button_url' => null,
'is_section_filled_inverted' => $data->about['is_section_filled_inverted'] ?? false,
])


@if ($module->about)
<x-core.layout :$is_section_filled_inverted :$with_padding :$is_filled :$button_header :$button_url :module_name="'about'">
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
    <div class="flex flex-wrap my-8">
        {{-- Profile Section --}}
        <div class="w-full p-4 text-center lg:w-1/4 lg:p-8" id="profile">
            <x-about.profile :$is_section_filled_inverted :$profile />
        </div>
        {{-- About Section --}}
        <div class="about-you-section text-sm w-full p-8 leading-loose md:w-2/3 lg:w-2/4 lg:px-16">
            <div id="profile-course-header"
                class="text-sm font-semibold mb-8 flex items-center gap-2 profile-course-header">
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
        <div class="w-full p-4 md:w-1/3 lg:w-1/4 text-sm lg:p-8" id="courses-and-graduations">
            <x-about.courses :$courses />
        </div>
    </div>
    {{-- Core: Slider --}}
    <x-hero.slider :$sliders />
</x-core.layout>
@endif
