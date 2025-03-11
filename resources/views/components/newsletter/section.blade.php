@props(['data', 'module'])

{{-- Livewire Component: Newsletter / Email Catcher --}}

@if ($module->newsletter)
<x-core.layout :with_padding="true">
    <div class="container w-full mx-auto">
        <div
            class="py-16  px-8 items-center border border-secondary-100 dark:border-secondary-900 rounded-3xl bg-white dark:bg-black text-left bg-dots relative overflow-hidden">
            <div class="absolute inset-0 bg-white bg-opacity-50 dark:bg-black dark:bg-opacity-70 z-0"></div>
            <div class="mx-auto relative z-10 max-w-md">
                <h2 class="text-3xl font-bold">{!! $data->mailing['section_title'] !!}</h2>
                <p class="my-2">{!! $data->mailing['section_subtitle'] !!}</p>
                <div class="mt-1 mx-auto grid">
                    <livewire:newsletter />
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('img/core/core-ui-elements/beams/blur-beam.png') }}"
        class="absolute -z-10 -mt-4 animate-pulse " />
</x-core.layout>
@endif
