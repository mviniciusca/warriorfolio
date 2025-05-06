{{--

Core Component: Project / Portfolio Section
----------------------------------------------------------------
This component is responsible for rendering the project / portfolio section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Project\Section.php

--}}


@if($is_active)
<x-core.layout :$button_header :$button_url :$is_filled :$is_section_filled_inverted :$with_padding
    :module_name="'portfolio'">
    <x-core.layout.section-header :$button_header :$button_url :$is_centered :$title :$subtitle
        :$is_section_filled_inverted :$is_heading_visible />
    <section class="my-12" id="projects">
        @livewire('portfolio.gallery', ['is_section_filled_inverted' => $is_section_filled_inverted])
    </section>
</x-core.layout>
@endif
