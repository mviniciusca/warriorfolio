{{--

Core Component:Footer Section
----------------------------------------------------------------
This component is responsible for rendering the footer section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Footer\Section.php

--}}


@props([
    'setting' => null,
    'navigation' => null,
    'social' => null,
])

@if ($module->footer)
    <div class="{{ data_get($data, 'footer.section_fill') ? 'section-filled' : '' }} bg-cover bg-center bg-no-repeat"
        style="background-image: url({{ asset('img/core/demo/default-bg-footer.png') }})">
        <x-core.layout :with_padding='false'>
            {{-- Footer Section --}}
            <x-footer.content-module :$setting :$navigation :$social />
        </x-core.layout>
    </div>
@endif
