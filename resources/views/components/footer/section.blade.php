@if($module->footer)
<x-core.layout class="{{ $info->footer_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="footer">
    <div class="container">
        {{-- Footer Content --}}
        <x-footer.content-module :setting='$setting' />
    </div>
</x-core.layout>
@endif
