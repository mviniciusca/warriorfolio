@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <header class="body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center text-md">
                {{-- Navigation --}}
                <nav class="flex lg:w-2/5 flex-wrap items-center md:ml-auto" id="nav-menu">
                    <a href="#hero" class="mr-5 hover:text-primary-500 cursor-pointer">Homepage</a>
                    <a href="#about" class="mr-5 hover:text-primary-500 cursor-pointer">About Me</a>
                    <a href="#portfolio" class="mr-5 hover:text-primary-500 cursor-pointer">Projects</a>
                    <a href="#clients" class="hover:text-primary-500 cursor-pointer">Customers</a>
                    <a href="#contact" class="ml-5 hover:text-primary-500 cursor-pointer">Contact</a>
                </nav>
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
    <script>

    </script>
</div>