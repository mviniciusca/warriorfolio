<x-content-section>
<div class="w-full grid grid-cols-2 gap-28 lg:mt-16 items-center ">

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
