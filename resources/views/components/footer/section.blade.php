@props(['setting'])

@if($module->footer)
<footer class="mx-auto">
    <x-core.layout class="{{ data_get($data, 'footer.section_fill') ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}"
        id="footer">
        <x-footer.content-module :setting='$setting' />
    </x-core.layout>
</footer>
@endif