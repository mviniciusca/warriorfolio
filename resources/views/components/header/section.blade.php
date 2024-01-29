<section class="px-4 py-4 md:py-8">
    <div class="mx-auto max-w-7xl">
        <header class="mt-4 flex w-full flex-wrap items-center justify-between">
            <div class="flex items-center gap-8">
                <span class="-mt-2">
                    <a href="/">
                        <x-ui.logo />
                    </a>
                </span>
                <x-header.navigation :$navigation />
            </div>
            <div class="flex flex-wrap items-center">
                <livewire:dark-mode wire:key='header-dark-mode' />
            </div>
        </header>
    </div>
</section>
