@props(['setting'])

@if($module->footer)
<footer class="mx-auto px-4">
    <x-core.layout class="{{ $info->footer_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="footer">
        <x-footer.content-module :setting='$setting' />
    </x-core.layout>
</footer>
@endif
