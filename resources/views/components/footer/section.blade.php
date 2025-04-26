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
'module' => $data->module ?? null,
'navigation' => $data->navigation->content ?? null,
'is_section_filled_inverted' => $data->layout->footer['is_section_filled_inverted'] ?? false,
'with_padding' => $data->layout->footer['with_padding'] ?? false,
])

@if ($data->module->footer ?? false)
<div class="{{ $data->layout->footer['section_fill'] ?? false ? 'section-filled' : '' }}">
    <x-core.layout :$is_section_filled_inverted :$with_padding>
        <div class="py-8 border-t border-gray-200 dark:border-gray-800" id="footer-content">
            <div class="mx-auto p-4">
                <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <x-ui.logo />
                        <span class="text-xs">
                            © {{ date('Y') }} {{ data_get($data, 'application.name', config('app.name',
                            env('APP_NAME'))) }}
                        </span>
                    </div>
                    <x-ui.social-network size="default" />
                </div>
            </div>
        </div>
    </x-core.layout>
</div>
@endif
