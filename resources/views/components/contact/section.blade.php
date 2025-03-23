{{--

Core Component: Contact Section
----------------------------------------------------------------
This component is responsible for rendering the contact section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Contact\Section.php

--}}

@props([
    'button_header' => null,
    'button_url' => null,
    'with_padding' => null,
    'is_filled' => $data->contact['section_fill'] ?? false,
    'is_section_filled_inverted' => $data->contact['is_section_filled_inverted'] ?? false,
    'is_heading_visible' => $data->contact['is_heading_visible'] ?? true,
])

@if ($module->contact)
    <x-core.layout :$is_section_filled_inverted :$with_padding :$is_filled :$button_header :$button_url :module_name="'contact'">

        @if($is_heading_visible ?? false)
            @if ($data->contact['section_title'])
                <x-slot name="module_title">
                    {!! $data->contact['section_title'] !!}
                </x-slot>
            @endif
            @if ($data->contact['section_subtitle'])
                <x-slot name="module_subtitle">
                    {!! $data->contact['section_subtitle'] !!}
                </x-slot>
            @endif
        @endif

        <section id="contact-wrapper" class="mx-auto my-12 flex flex-wrap justify-between">
            <div class="w-full p-8 lg:w-2/3">
                @if (data_get($data, 'contact.google_maps_code'))
                    <div
                        class="relative flex h-96 items-end justify-start overflow-hidden rounded-lg p-10 lg:h-full {{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-50 dark:bg-secondary-50 dark:text-secondary-950' : ' bg-secondary-50 dark:bg-secondary-950' }}">
                        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map"
                            marginheight="0" marginwidth="0" scrolling="no"
                            src="{{ $data->contact['google_maps_code'] }}"
                            style="filter: grayscale(1) contrast(1) opacity(0.9);">
                        </iframe>
                        <div class="relative flex flex-wrap rounded  py-6 text-xs {{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-50 dark:bg-secondary-50 dark:text-secondary-950' : ' bg-secondary-50 dark:bg-secondary-950' }}">
                            <div class="px-6">
                                <h2 class="font-semibold uppercase tracking-widest">{{ __('Address') }}</h2>
                                <p class="mt-3">{!! $data->contact['public_address'] !!}</p>
                            </div>
                            <div class="mt-4 px-6 lg:mt-0">
                                <h2 class="mb-1 font-semibold uppercase tracking-widest">{{ __('E-mail') }}</h2>
                                <a class="leading-relaxed">{{ $data->contact['public_email'] }}</a>
                                <h2 class="mb-1 mt-4 font-semibold uppercase tracking-widest">{{ __('Phone') }}</h2>
                                <p class="leading-relaxed">{{ $data->contact['public_phone'] }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Address without Google Maps --}}
                    <div class="mx-auto grid pr-8">
                        @if ($data->contact['public_address'])
                            <x-ui.info-box title="{{ __('Headquarter') }}" icon="business">
                                <p>{!! $data->contact['public_address'] !!}</p>
                            </x-ui.info-box>
                        @endif
                        <div class="flex flex-wrap">
                            @if ($data->contact['public_phone'])
                                <span class="w-1/2">
                                    <x-ui.info-box title="{{ __('Phone') }}" icon="call">
                                        <p>{!! '+' . env('MOBILE_COUNTRY_CODE') . ' ' . $data->contact['public_phone'] !!}</p>
                                    </x-ui.info-box>
                                </span>
                            @endif
                            @if ($data->contact['public_email'])
                                <span class="w-1/2">
                                    <x-ui.info-box title="{{ __('Mail') }}" icon="mail-open">
                                        <p>{!! $data->contact['public_email'] !!}</p>
                                    </x-ui.info-box>
                                </span>
                            @endif
                        </div>
                        {{-- Social Network --}}
                        @if ($social_network)
                            <x-ui.info-box title="{{ __('Follow') }}" icon="infinite">
                                <x-ui.social-network />
                            </x-ui.info-box>
                        @endif
                        {{-- End Social Network --}}
                        {{-- Empty Fields --}}
                        @if (
                            $data->contact['public_address'] == null ||
                                ($data->contact['public_phone'] == null && $data->contact['public_email'] == null))
                            <x-contact.empty-address :$data />
                        @endif
                        {{-- End Empty Fields --}}
                    </div>
                @endif
            </div>
            {{-- Livewire: Message Form --}}
            <div class="w-full p-4 lg:w-1/3 lg:p-8">
                <livewire:mail.create-mail :$is_section_filled_inverted />
            </div>
        </section>
    </x-core.layout>
@endif
