{{--

View: Maintenance Mode
----------------------------------------------------------------
This component is responsible for rendering the maintenance mode section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Maintenance\Section.php

--}}
@props(['maintenance' => null])

<section class="maintenance-mode h-screen w-full">
    <div class="mx-auto grid h-full max-w-screen-xl items-center px-4 py-8 lg:px-6 lg:py-16">
        <div class="mt-5 flex flex-col items-center md:flex-row">
            <div class="absolute left-0 right-0 top-0 mt-12 inline-block items-center justify-center text-center">
                <livewire:darkMode wire:key='maintenance-dark-mode' />
            </div>
            <div class="{{ $maintenance->is_contact ? 'lg:w-1/2' : 'lg:w-full' }} w-full content-center justify-center p-8 text-center md:w-1/2"
                id="col-a">
                <div class="mx-auto text-center">
                    @if ($maintenance->image)
                        <img alt="Maintenance" class="mx-auto max-w-72 rounded-md text-center"
                            src="{{ asset('storage/' . $maintenance->image) }}" />
                    @else
                        <x-ui.logo :link="false" :size="'max-w-36'" />
                    @endif
                    <div class="pt-4 text-base" id="maintenance-content">
                        {!! $maintenance->content !!}
                    </div>
                    @if ($maintenance->is_social)
                        <p class="mb-8">
                            <x-ui.social-network />
                        </p>
                    @endif
                </div>
            </div>
            @if ($maintenance->is_contact)
                <div class="w-full p-8 md:w-1/2" id="col-b">
                    <p class="mb-4 text-base font-bold">{{ __('Get in Touch') }}</p>
                    @livewire('mail.create-mail')
                </div>
            @endif
        </div>
    </div>
</section>
