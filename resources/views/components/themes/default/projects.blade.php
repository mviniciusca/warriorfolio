@if($is_active)
<x-core.layout :$is_filled :$with_padding :$module_name :$button_header :$button_url :$is_centered :$title :$subtitle
    :$is_section_filled_inverted :$is_heading_visible :$button_icon :$module_slug>
    <section class="my-12" id="projects">
        @livewire('portfolio.gallery', ['is_section_filled_inverted' => $is_section_filled_inverted])
    </section>
</x-core.layout>
@endif
