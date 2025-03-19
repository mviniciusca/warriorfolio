@props(['data', 'module'])

{{--

Core Component: Newsletter / Email Catcher Section
Livewire Application
----------------------------------------------------------------
This component is responsible for rendering the newsletter / email catcher section of the website. This is a Livewire component.
-------------------------------------------------------------------
Data:
App\Livewire\Newsletter.php

--}}

@if ($module->newsletter)
    <x-core.layout :with_padding="true">
        <div class="container mx-auto w-full">
            <div
                class="bg-dots relative items-center overflow-hidden rounded-3xl border border-secondary-100 bg-white px-8 py-16 text-left dark:border-secondary-900 dark:bg-black">
                <div class="absolute inset-0 z-0 bg-white bg-opacity-50 dark:bg-black dark:bg-opacity-70"></div>
                <div class="relative z-10 mx-auto max-w-md">
                    <h2 class="header-title newsletter-header-title font-bold">{!! $data->mailing['section_title'] !!}</h2>
                    <p class="my-2 text-sm">{!! $data->mailing['section_subtitle'] !!}</p>
                    <div class="mx-auto mt-1 grid">
                        <livewire:newsletter />
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('img/core/core-ui-elements/beams/blur-beam.png') }}"
            class="absolute -z-10 -mt-4 animate-pulse" />
    </x-core.layout>
@endif
