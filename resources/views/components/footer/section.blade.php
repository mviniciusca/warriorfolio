@props(['setting'])

@if ($module->footer)
    <div class="{{ data_get($data, 'footer.section_fill') ? 'section-filled' : null }}">
        <x-core.layout>
            <x-footer.content-module :setting='$setting' />
        </x-core.layout>
    </div>
@endif
