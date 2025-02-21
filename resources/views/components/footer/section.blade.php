@props(['setting'])

@if ($module->footer)
    <div class="{{ data_get($data, 'footer.section_fill') ? 'bg-secondary-100  dark:bg-secondary-900' : '' }}">
        <x-core.layout>
            <x-footer.content-module :setting='$setting' />
        </x-core.layout>
    </div>
@endif
