@if($module->footer)
<x-core.layout class="{{ $info->footer_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}">
    <div class="container">
        {{-- Newsletter Module --}}
        @if($module->newsletter)
        <x-footer.newsletter-module :info='$info' />
        @endif
        {{-- Footer Content --}}
        <x-footer.content-module :setting='$setting' />
    </div>
</x-core.layout>
@endif
