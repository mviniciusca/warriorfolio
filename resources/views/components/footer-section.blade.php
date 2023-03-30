<x-content-section>
<div class="mb-2 grid mt-12 lg:mt-24 lg:grid-cols-2 lg:gap-24 justify-center lg:justify-start">

{{--Footer Logo --}}
    <div class="pb-4">
       <x-ui.logo />
    </div>

{{--  Footer Social Media Links --}}
    <div class="gap-2 justify-end items-center text-zinc-500 hidden lg:flex">
       <x-ui.social-network :profile='$profile' />
    </div>
</div>

</x-content-section>
{{-- Background Footer Lights --}}
<div class="absolute w-full h-[600px] mt-[-600px] -z-30 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('/img/blur-end.png') }}')"></div>

