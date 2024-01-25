<section class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <header class="body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center text-md">
                {{-- Navigation --}}
                <x-header.navigation />
                {{-- Logo --}}
                <a href="#hero"
                    class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                    <x-ui.logo />
                </a>
                {{-- Dark Mode App --}}
                <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                    @livewire('dark-mode')
                </div>
            </div>
        </header>
    </div>
</section>