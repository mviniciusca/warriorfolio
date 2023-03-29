{{-- Footer --}}
<x-content-section>
<div class="mb-8 grid mt-12 lg:mt-24 lg:grid-cols-2 lg:gap-24 items-center justify-center lg:justify-start">

{{--Footer Logo --}}
    <div class="pb-4">
       <x-ui.logo />
    </div>

{{--  Footer Social Media Links --}}
    <div class="gap-2 justify-end items-center text-zinc-500 hidden lg:flex">

        {{-- Github --}}
        @isset($social_links['github_link'])
            <a href="{{ $social_links['github_link'] }}">
                <span class="text-lg lg:text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-github"></ion-icon></span>
            </a>
        @endisset

        {{-- Medium --}}
        @isset($social_links['medium_link'])
            <a href="{{ $social_links['medium_link'] }}">
                <span class="text-lg lg:text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-medium"></ion-icon></span>
            </a>
        @endisset

        {{-- Twitter --}}
        @isset($social_links['twitter_link'])
            <a href="{{ $social_links['twitter_link'] }}">
                <span class="text-lg lg:text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-twitter"></ion-icon></span>
            </a>
        @endisset

        {{-- Dribbble --}}
        @isset($social_links['dribbble_link'])
            <a href="{{ $social_links['dribbble_link'] }}">
                <span class="text-lg lg:text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-dribbble"></ion-icon></span>
            </a>
        @endisset

        {{-- LinkedIn --}}
        @isset($social_links['linkedin_link'])
            <a href="{{ $social_links['linkedin_link'] }}">
                <span class="text-lg lg:text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-linkedin"></ion-icon></span>
            </a>
        @endisset
    </div>
</div>
</x-content-section>
{{-- Background Footer Lights --}}
<div class="absolute w-full h-[600px] mt-[-600px] -z-30 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('/img/blur-end.png') }}')"></div>

