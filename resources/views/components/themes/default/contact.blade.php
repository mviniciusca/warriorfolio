@if($is_active)
<x-core.layout :$is_filled :$with_padding :$module_name :$button_header :$button_url :$is_centered :$title :$subtitle
    :$is_section_filled_inverted :$is_heading_visible :$button_icon :$module_slug>
    <section class="mx-auto my-12 flex flex-wrap justify-between" id="contact-wrapper">
        <div class="w-full lg:w-2/3 pr-8">
            @if ($content['google_map'] ?? null)
            <div
                class="{{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-50 dark:bg-secondary-50 dark:text-secondary-950' : ' bg-secondary-50 dark:bg-secondary-950' }} relative flex h-96 items-end justify-start overflow-hidden rounded-lg p-10 lg:h-full">
                <iframe class="absolute inset-0" frameborder="0" height="100%" marginheight="0" marginwidth="0"
                    scrolling="no" src="{{ $content['google_map'] ?? null }}"
                    style="filter: grayscale(1) contrast(1) opacity(0.9);" title="map" width="100%">
                </iframe>
                <div
                    class="{{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-50 dark:bg-secondary-50 dark:text-secondary-950' : ' bg-secondary-50 dark:bg-secondary-950' }} relative flex flex-wrap rounded py-6 text-xs">
                    <div class="px-6">
                        <h2 class="font-semibold uppercase tracking-widest">{{ __('Address') }}</h2>
                        <p class="mt-3">{!! $content['address'] ?? null !!}</p>
                    </div>
                    <div class="mt-4 px-6 lg:mt-0">
                        <h2 class="mb-1 font-semibold uppercase tracking-widest">{{ __('E-mail') }}</h2>
                        <a class="leading-relaxed">{{ $content['email'] }}</a>
                        <h2 class="mb-1 mt-4 font-semibold uppercase tracking-widest">{{ __('Phone') }}</h2>
                        <p class="leading-relaxed">{{ $content['phone'] }}</p>
                    </div>
                </div>
            </div>
            @else
            {{-- Address without Google Maps --}}
            <div class="mx-auto grid pr-8">
                @if ($content['address'] ?? null)
                <x-ui.info-box icon="business" title="{{ __('Headquarter') }}">
                    <p>{!! $content['address'] ?? null !!}</p>
                    <p>{!! $content['business_hours'] ?? null !!}</p>
                </x-ui.info-box>
                @endif
                <div class="flex flex-wrap">
                    @if ($content['phone'] ?? null)
                    <span class="w-1/2">
                        <x-ui.info-box icon="call" title="{{ __('Phone') }}">
                            <p>{!! '+' . config('MOBILE_COUNTRY_CODE') . ' ' . ($content['phone'] ?? null)
                                !!}
                            </p>
                        </x-ui.info-box>
                    </span>
                    @endif
                    @if ($content['email'] ?? null)
                    <span class="w-1/2">
                        <x-ui.info-box icon="mail-open" title="{{ __('Mail') }}">
                            <p>{!! $content['email'] ?? null !!}</p>
                        </x-ui.info-box>
                    </span>
                    @endif
                </div>
                {{-- Social Network --}}
                @if ($socialNetwork)
                <x-ui.info-box icon="infinite" title="{{ __('Follow') }}">
                    <x-ui.social-network justify="start" />
                </x-ui.info-box>
                @endif
                {{-- End Social Network --}}
                {{-- Empty Fields --}}
                @if (
                ($content['address'] ?? null) == null ||
                (($content['phone'] ?? null) == null && ($content['email'] ?? null) == null))
                <x-ui.empty-address :data="$content" />
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
