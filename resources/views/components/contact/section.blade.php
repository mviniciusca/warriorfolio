@if($module_visibility->contact === 1)
<x-core.layout class='bg-secondary-950'>
    @if($contact->contact_section_title)
    <div class="header-title mb-2">{!! $contact->contact_section_title !!}</div>
    @endif
    @if($contact->contact_section_subtitle_text)
    <div class="text-center text-lg max-w-2xl mt-4 mx-auto">{!! $contact->contact_section_subtitle_text !!}</div>
    @endif
    <div class="flex mt-24 lg:gap-8" id="contact">
        @if($contact->contact_section_google_map !== null)
        <div
            class="lg:w-2/3 md:w-1/2 bg-secondary-600 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                marginwidth="0" scrolling="no" src="{{ $contact->contact_section_google_map }}"
                style="filter: grayscale(1) contrast(1.2) opacity(0.5);">
            </iframe>
            <div class="bg-secondary-800 text-xs relative flex flex-wrap py-6 rounded shadow-md">
                <div class="lg:w-1/2 px-6">
                    <h2 class=" font-semibold tracking-widest">ADDRESS</h2>
                    <p class="mt-3">{{ $contact->contact_section_address }}</p>
                </div>
                <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="font-semibold tracking-widest">EMAIL</h2>
                    <a class="text-indigo-500 leading-relaxed">{{ $contact->contact_section_email }}</a>
                    <h2 class="font-semibold tracking-widest mt-4">PHONE</h2>
                    <p class="leading-relaxed">{{ $contact->contact_section_phone }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="content-center grid w-1/2 lg:pr-24 items-start">
            <x-ui.info-box title="Headquarter" icon="business">
                <p>{!! $contact->contact_section_address !!}</p>
            </x-ui.info-box>
            <div class="flex">
                <span class="w-1/2">
                    <x-ui.info-box title="Phone" icon="call">
                        <p>{!! $contact->contact_section_phone !!}</p>
                    </x-ui.info-box>
                </span>
                <span class="w-1/2">
                    <x-ui.info-box title="Mail" icon="mail-open">
                        <p>{!! $contact->contact_section_email !!}</p>
                    </x-ui.info-box>
            </div>
            <x-ui.info-box title="Follow" icon="infinite">
                <x-ui.social-network />
            </x-ui.info-box>
        </div>
        @endif
        <div class=" lg:w-1/2 md:w-1/2 flex flex-col md:ml-auto w-full">
            @livewire('mail.create-mail')
        </div>
</x-core.layout>
@endif
