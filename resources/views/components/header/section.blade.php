<section class="px-4 py-4 md:py-8">
    <div class="mx-auto max-w-7xl">
        <header class="body-font">
            <div class="text-md container mx-auto flex flex-col flex-wrap items-center p-5 md:flex-row">
                {{-- Navigation --}}
                <x-header.navigation />
                {{-- Logo --}}
                <a href="#hero"
                    class="title-font order-first mb-4 flex items-center font-medium text-gray-900 md:mb-0 lg:order-none lg:w-1/5 lg:items-center lg:justify-center">
                    <x-ui.logo />
                </a>
                {{-- Dark Mode App --}}
                <div class="ml-5 inline-flex lg:ml-0 lg:w-2/5 lg:justify-end">
                    <livewire:dark-mode wire:key='header-dark-mode' />
                </div>
            </div>
        </header>
    </div>
</section>
