<x-core.layout class="bg-top bg-cover bg-no-repeat">
    <div class="header-title">
        {!! $info->contact_section_title !!}
    </div>
    @if($info->contact_section_subtitle_text)
    <div class="subtitle text-xl text-center mt-2">
        {!! $info->contact_section_subtitle_text !!}
    </div>
    @endif
    <div class="container">

        {{-- Cobtact Module --}}
        <div id="mail-module" class="max-w-2xl justify-center items-center mx-auto">
            @livewire('mail.create-mail')
        </div>

        {{-- Newsletter Module --}}
        @if($module->newsletter)
        <x-footer.newsletter-module :info='$info' />
        @endif

        <div id="footer-content">
            <div class="flex flex-wrap gap-2  mx-auto px-5 pt-36  sm:flex-row items-center">
                {{-- App Logo --}}
                @if($setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name }}" class="w-8 h-8 mr-4">
                @else
                <x-ui.logo />
                @endif
                {{-- App Name --}}
                <p class=" text-sm text-center sm:text-left">
                    © {{ date('Y') }} - {{$setting->name}}
                </p>
                {{-- Social Network --}}
                <div class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-sm">
                    <x-ui.social-network />
                </div>
            </div>
        </div>
    </div>
</x-core.layout>
