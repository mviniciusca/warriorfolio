@props(['setting' => null, 'navigation' => null])

@if ($module->footer)
    <div class="{{ data_get($data, 'footer.section_fill') ? 'section-filled' : '' }}">
        <x-core.layout>
            <x-footer.content-module :$setting :$navigation :$social />
        </x-core.layout>
    </div>
@endif
