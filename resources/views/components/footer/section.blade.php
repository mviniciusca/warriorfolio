@if($module->footer)
<x-core.layout class="{{ $info->footer_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="footer">
    <div class="container">
        {{-- Footer Content --}}
        <x-footer.content-module :setting='$setting' />
    </div>
</x-core.layout>
<div id="bg-footer" class="bg-footer absolute z-10 -mt-24 h-24 w-full animate-pulse bg-auto bg-bottom bg-no-repeat"
    style="background-image: url('img/core/blur-footer-bg.png')"></div>
@endif
