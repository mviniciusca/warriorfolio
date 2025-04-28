{{--

Core Component: Project / Portfolio Section
----------------------------------------------------------------
This component is responsible for rendering the project / portfolio section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Project\Section.php

--}}

@props([
'button_header' => null,
'button_url' => null,
'with_padding' => null,
'is_filled' => $data->portfolio['section_fill'] ?? false,
'is_section_filled_inverted' => $data->portfolio['is_section_filled_inverted'] ?? false,
'is_heading_visible' => $data->portfolio['is_heading_visible'] ?? false,
])

@if ($module->portfolio)

<x-core.layout :$button_header :$button_url :$is_filled :$is_section_filled_inverted :$with_padding
    :module_name="'portfolio'">

    @if ($is_heading_visible ?? false)
    @if ($data->portfolio['section_title'])
    <x-slot name="module_title">
        {!! $data->portfolio['section_title'] !!}
    </x-slot>
    @endif
    @if ($data->portfolio['section_subtitle'])
    <x-slot name="module_subtitle">
        {!! $data->portfolio['section_subtitle'] !!}
    </x-slot>
    @endif
    @endif

    <section class="my-12" id="projects">
        @livewire('portfolio.gallery', ['is_section_filled_inverted' => $is_section_filled_inverted])
    </section>

    @if ($projects->count() === 0)
    <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Project.')" />
    @endif
</x-core.layout>

@endif
