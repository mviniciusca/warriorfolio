{{--

Core Component:Footer Section
----------------------------------------------------------------
This component is responsible for rendering the footer section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Footer\Section.php

--}}

@props([
    'data' => null,
    'module' => null,
    'setting' => null,
    'navigation' => null,
    'social' => null,
    'is_section_filled_inverted' => false,
])
@if ($module->footer ?? false)
    <div class="{{ ($data->footer['section_fill'] ?? false) ? 'section-filled' : '' }} bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset('img/core/demo/default-bg-footer.png') }})">
            <x-core.layout :with_padding='false'>
                {{-- Footer Section --}}
                <x-footer.content-module :$setting :$navigation :$social />
            </x-core.layout>
        </div>
@endif
