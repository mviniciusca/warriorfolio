<x-core.layout class="bg-top bg-cover bg-no-repeat">
    <div class="container">
        {{-- Newsletter Module --}}
        @if($module_visibility->newsletter)
        <x-footer.newsletter-module :info='$info' />
        @endif
        {{-- Footer Content --}}
        <x-footer.content-module :setting='$setting' />
    </div>
</x-core.layout>
