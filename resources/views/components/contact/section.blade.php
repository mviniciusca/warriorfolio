@if($module->contact)
<x-core.layout class="{{ $info->contact_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}" id="contact">
    @if($info->contact_section_title)
    <div class="header-title mb-2">{!! $info->contact_section_title !!}</div>
    @endif
    @if($info->contact_section_subtitle_text)
    <div class="text-center text-lg max-w-2xl mt-4 mx-auto">{!! $info->contact_section_subtitle_text !!}</div>
    @endif
    <div class="flex mt-24 lg:gap-8" id="contact">
        {{-- Address with Google Maps --}}
        @if($info->contact_section_google_map !== null)
        <div
            class="lg:w-2/3 md:w-1/2 bg-secondary-100 dark:bg-secondary-600 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                marginwidth="0" scrolling="no" src="{{ $info->contact_section_google_map }}"
                style="filter: grayscale(1) contrast(1.2) opacity(0.5);">
            </iframe>
            <div class="bg-secondary-100 dark:bg-secondary-900 text-xs relative flex flex-wrap py-6 rounded shadow-md">
                <div class="lg:w-1/2 px-6">
                    <h2 class=" font-semibold tracking-widest">ADDRESS</h2>
                    <p class="mt-3">{!! $info->contact_section_address !!}</p>
                </div>
                <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="font-semibold tracking-widest mb-1">EMAIL</h2>
                    <a class="leading-relaxed">{{ $info->contact_section_email }}</a>
                    <h2 class="font-semibold tracking-widest mt-4 mb-1">PHONE</h2>
                    <p class="leading-relaxed">{{ $info->contact_section_phone }}</p>
                </div>
            </div>
        </div>
        @else
        {{-- Address without Google Maps --}}
        <div class="content-start grid w-1/2 lg:pr-24 items-start">
            @if($info->contact_section_address)
            <x-ui.info-box title="Headquarter" icon="business">
                <p>{!! $info->contact_section_address !!}</p>
            </x-ui.info-box>
            @endif
            <div class="flex">
                @if($info->contact_section_phone)
                <span class="w-1/2">
                    <x-ui.info-box title="Phone" icon="call">
                        <p>{!! $info->contact_section_phone !!}</p>
                    </x-ui.info-box>
                </span>
                @endif
                @if($info->contact_section_email)
                <span class="w-1/2">
                    <x-ui.info-box title="Mail" icon="mail-open">
                        <p>{!! $info->contact_section_email !!}</p>
                    </x-ui.info-box>
                </span>
                @endif
            </div>
            {{-- Social Network  --}}
            @if($social_network != 0)
            <x-ui.info-box title="Follow" icon="infinite">
                <x-ui.social-network />
            </x-ui.info-box>
            @endif
            {{-- End Social Network  --}}
            {{-- Empty Fields --}}
            @if($info->contact_section_address == null ||
            $info->contact_section_phone == null && $info->contact_section_email == null)
            <x-contact.empty-address />
            @endif
            {{-- End Empty Fields --}}
        </div>
        @endif
        {{-- End Address--}}
        {{-- Contact Form--}}
        <div class="flex flex-col w-full lg:w-1/2 md:w-1/2 md:ml-auto">
            @livewire('mail.create-mail')
        </div>
        {{-- End Contact Form--}}
</x-core.layout>
@endif
