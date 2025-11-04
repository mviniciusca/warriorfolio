@props(['maintenance' => null])

<section class="maintenance-mode min-h-screen w-full bg-white dark:bg-secondary-950">
    <div class="relative mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-12">
        <!-- Dark mode toggle -->
        <div class="absolute right-4 top-4 z-10">
            <livewire:darkMode wire:key='maintenance-dark-mode' />
        </div>

        <!-- Main content wrapper -->
        <div class="flex min-h-[80vh] flex-col items-center justify-center p-6 md:p-10 lg:p-12">
            <div class="mt-4 flex w-full flex-col items-center gap-8 md:flex-row md:gap-12">
                <!-- Content column -->
                <div class="{{ $maintenance->is_contact ? 'md:w-1/2' : 'md:max-w-2xl md:mx-auto' }} w-full">
                    <div class="mx-auto text-center">
                        <!-- Logo/Image with minimal styling -->
                        <div class="mb-8">
                            @if ($maintenance->image)
                            <img alt="Maintenance" class="mx-auto max-w-56"
                                src="{{ asset('storage/' . $maintenance->image) }}" />
                            @else
                            <div class="mx-auto w-fit">
                                <x-ui.logo :link="false" :size="'max-w-28'" />
                            </div>
                            @endif
                        </div>

                        <!-- Content area with minimal styling -->
                        <div class="prose mx-auto max-w-prose text-secondary-700 dark:text-secondary-300"
                            id="maintenance-content">
                            {!! $maintenance->content ?? __('Maintenance Mode') !!}
                        </div>

                        <!-- Social networks with minimal styling -->
                        @if ($maintenance->is_social ?? false)
                        <div class="mt-8">
                            <div class="flex justify-center space-x-4 text-secondary-500 dark:text-secondary-400">
                                <x-ui.social-network />
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Contact form column -->
                @if ($maintenance->is_contact ?? false)
                <div class="w-full border-l border-secondary-200 p-6 dark:border-secondary-800 md:w-1/2 lg:p-8"
                    id="col-b">
                    <h2 class="mb-6 text-lg font-medium text-secondary-800 dark:text-secondary-200">{{ __('Get in
                        Touch') }}</h2>
                    @livewire('mail.create-mail')
                </div>
                @endif
            </div>


        </div>
    </div>
</section>
