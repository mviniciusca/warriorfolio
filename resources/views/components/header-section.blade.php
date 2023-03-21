<x-content-section>
    <div class="grid w-full grid-cols-2 items-center gap-28 lg:mt-16">
        {{-- Logo --}}
        <div class="flex justify-start">
            <x-ui.logo />
        </div>
        {{-- Navgation --}}
        <div class="flex justify-end">
            <x-nav.bar :links='$links' />
        </div>
    </div>
</x-content-section>
