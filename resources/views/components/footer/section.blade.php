@props(['setting' => null, 'navigation' => null])

@if ($module->footer)
    <div class="{{ data_get($data, 'footer.section_fill') ? 'section-filled' : '' }} bg-cover bg-center bg-no-repeat"
        style="background-image: url({{ asset('img/core/demo/default-bg-footer.png') }})">
        <x-core.layout>
            <x-footer.content-module :$setting :$navigation :$social />
        </x-core.layout>
    </div>
@endif
