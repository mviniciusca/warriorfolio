<x-core.layout class="bg-secondary-900">
    <div class="header-title">{!! $info->contact_section_title !!}</div>
    @if($info->contact_section_subtitle_text)
    <div class="subtitle text-xl text-center mt-2">{!! $info->contact_section_subtitle_text !!}</div>
    @endif
    <div class="mt-24 grid mx-auto items-center container">
        {{-- Cobtact Module --}}
        @livewire('mail.create-mail')
        {{-- End Contact Module --}}
        {{-- Newslettrer Module --}}
        <div class="container mx-auto">
            <div
                class="mx-auto border border-secondary-800 grid lg:flex gap-8 my-48 py-8 px-8 bg-gradient-to-tl from-secondary-950 to-secondary-800 bg-secondary-950 items-center justify-center lg:justify-between rounded-xl">
                <img class="h-48" src="{{ asset('img/SVG/developer.svg') }}" alt="whats next"
                    class="w-32 h-32 mx-auto" />
                <span class="text-5xl font-extrabold leading-tight tracking-tighter">the what's <span
                        class="text-highlight">next</span>
                    <p class="text-sm tracking-normal font-normal">join our mailing list</p>
                </span>
                <span>@livewire('newsletter')</span>
            </div>
        </div>
        {{-- End Newslettrer Module --}}
        <div>
            <div class="gap-2 container mx-auto px-5 flex flex-wrap flex-col sm:flex-row items-center">
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name }}" class="w-8 h-8 mr-4">
                <p class=" text-sm text-center sm:text-left">© {{ date('Y') }} - {{$setting->name}}
                </p>
                <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-sm">
                    <x-ui.social-network />
                </span>
            </div>
        </div>
    </div>
    </div>
</x-core.layout>
