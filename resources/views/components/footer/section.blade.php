{{--

Core Component:Footer Section
----------------------------------------------------------------
This component is responsible for rendering the footer section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Footer\Section.php

--}}

@props([
    'data' => null,
    'module' => $data->module ?? null,
    'navigation' => $data->navigation->content ?? null,
    'is_section_filled_inverted' => $data->layout->footer['is_section_filled_inverted'] ?? false,
    'with_padding' => $data->layout->footer['with_padding'] ?? false,
])

@if ($data->module->footer ?? false)
    <div class="{{ $data->layout->footer['section_fill'] ?? false ? 'section-filled' : '' }} bg-cover bg-center bg-no-repeat"
        style="background-image: url({{ asset('img/core/demo/default-bg-footer.png') }})">
        <x-core.layout :$is_section_filled_inverted :$with_padding>
            <div class="py-8" id="footer-content">
                <div class="mx-auto p-4 py-6 text-sm lg:py-8">
                    <div class="md:flex md:justify-between md:gap-12">
                        <div class="mb-6 text-center md:mb-0 md:text-left">
                            <x-ui.logo />
                        </div>
                        <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-10">
                            <div>
                                <h2 class="mb-6 text-sm font-semibold uppercase">{{ __('Pages') }}
                                </h2>
                                <ul class="space-y-4 text-sm font-medium">
                                    @foreach ($data->navigation->content ?? [] as $content)
                                        @if ($content['is_active'])
                                            <li>
                                                <a class="hover:underline" href="{{ $content['url'] }}"
                                                    target="{{ $content['target'] }}">{!! $content['name'] !!}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            @if (($data->user->profile->social ?? null) != null)
                                <div>
                                    <h2 class="mb-6 text-sm font-semibold uppercase">
                                        {{ __('Follow') }}
                                    </h2>
                                    <ul class="space-y-4 font-medium">
                                        @foreach ($data->user->profile->social ?? [] as $item)
                                            @if ($item['is_active'])
                                                <li>
                                                    <a class="hover:underline" href="{{ $item['profile_link'] }}"
                                                        target="_blank">{{ ucfirst($item['social_network']) }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="mx-auto my-6 border-secondary-500/10" />
                <div class="flex-wrap sm:flex sm:items-center sm:justify-between">
                    <div class="order-4 sm:order-3">
                        <div class="text-center text-sm md:text-left">
                            ©
                            {{ date('Y') . ' - ' . data_get($data, 'application.name', config('app.name', env('APP_NAME'))) }}
                        </div>
                        <div class="mt-4 flex justify-center sm:hidden">
                            <x-ui.social-network />
                        </div>
                    </div>
                    <div class="order-3 mx-auto mt-4 hidden sm:order-4 sm:mx-0 sm:mt-0 sm:flex sm:justify-end">
                        <x-ui.social-network :size="'big'" />
                    </div>
                </div>
            </div>
        </x-core.layout>
    </div>
@endif
