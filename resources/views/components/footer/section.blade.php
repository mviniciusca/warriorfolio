{{--

Core Component: Footer Section
----------------------------------------------------------------
This component is responsible for rendering the footer section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Footer\Section.php

--}}

@props([
'data' => null,
'with_padding' => null,
])
@if ($is_active)
<div class="{{ $is_filled ? 'section-filled' : '' }}">
    <x-core.layout :$is_section_filled_inverted :$with_padding>
        <div class="py-8" id="footer-content">
            <div class="mx-auto">
                <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <x-ui.logo />
                        <span class="text-xs">
                            © {{ date('Y') }} {{ data_get($data, 'application.name', config('app.name',
                            env('APP_NAME'))) }}
                        </span>
                    </div>
                    @if($data->content['show_social_links'] ?? false)
                    <x-ui.social-network size="default" />
                    @endif
                </div>
            </div>
        </div>
    </x-core.layout>
</div>
@endif
