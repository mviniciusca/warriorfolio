@if($module->contact)
<x-core.layout class="{{ $info->contact_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}" id="contact">

    @if($info->contact_section_title)
    <x-slot name="module_title">
        {!! $info->contact_section_title !!}
    </x-slot>
    @endif

    @if($info->contact_section_subtitle_text)
    <x-slot name="module_subtitle">
        {!! $info->contact_section_subtitle_text !!}
    </x-slot>
    @endif

    <section id="contact-section">
        <div class="mt-12 flex lg:gap-8" id="contact-address">
            {{-- Address with Google Maps --}}
            @if($info->contact_section_google_map !== null)
            <div
                class="relative flex items-end justify-start overflow-hidden rounded-lg bg-secondary-100 p-10 dark:bg-secondary-600 sm:mr-10 md:w-1/2 lg:w-2/3">
                <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0"
                    marginwidth="0" scrolling="no" src="{{ $info->contact_section_google_map }}"
                    style="filter: grayscale(1) contrast(1.2) opacity(0.5);">
                </iframe>
                <div
                    class="relative flex flex-wrap rounded bg-secondary-100 py-6 text-xs shadow-md dark:bg-secondary-900">
                    <div class="px-6 lg:w-1/2">
                        <h2 class="font-semibold uppercase tracking-widest">{{ __('Address') }}</h2>
                        <p class="mt-3">{!! $info->contact_section_address !!}</p>
                    </div>
                    <div class="mt-4 px-6 lg:mt-0 lg:w-1/2">
                        <h2 class="mb-1 font-semibold uppercase tracking-widest">{{ __('E-mail') }}</h2>
                        <a class="leading-relaxed">{{ $info->contact_section_email }}</a>
                        <h2 class="mb-1 mt-4 font-semibold uppercase tracking-widest">{{ __('Phone') }}</h2>
                        <p class="leading-relaxed">{{ $info->contact_section_phone }}</p>
                    </div>
                </div>
            </div>
            @else
            {{-- Address without Google Maps --}}
            <div class="grid w-1/2 content-start items-start lg:pr-24">
                @if($info->contact_section_address)
                <x-ui.info-box title="{{ __('Headquarter') }}" icon="business">
                    <p>{!! $info->contact_section_address !!}</p>
                </x-ui.info-box>
                @endif
                <div class="flex">
                    @if($info->contact_section_phone)
                    <span class="w-1/2">
                        <x-ui.info-box title="{{ __('Phone') }}" icon="call">
                            <p>{!! $info->contact_section_phone !!}</p>
                        </x-ui.info-box>
                    </span>
                    @endif
                    @if($info->contact_section_email)
                    <span class="w-1/2">
                        <x-ui.info-box title="{{ __('Mail') }}" icon="mail-open">
                            <p>{!! $info->contact_section_email !!}</p>
                        </x-ui.info-box>
                    </span>
                    @endif
                </div>
                {{-- Social Network  --}}
                @if($social_network != 0)
                <x-ui.info-box title="{{ __('Follow') }}" icon="infinite">
                    <x-ui.social-network />
                </x-ui.info-box>
                @endif
                {{-- End Social Network  --}}
                {{-- Empty Fields --}}
                @if($info->contact_section_address == null ||
                $info->contact_section_phone == null && $info->contact_section_email == null)
                <x-contact.empty-address :$info />
                @endif
                {{-- End Empty Fields --}}
            </div>
            @endif
            {{-- End Address--}}
            {{-- Contact Form--}}
            <div class="flex w-full flex-col md:ml-auto md:w-1/2 lg:w-1/2">
                @livewire('mail.create-mail')
            </div>
            {{-- End Contact Form--}}
    </section>
</x-core.layout>
@endif
