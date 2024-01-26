<section class="bg-secondary-50 dark:bg-secondary-900 text-secondary-600 dark:text-secondary-50 h-screen w-full">
    <div class="absolute left-0 right-0 top-0 mt-5 text-center justify-center items-center inline-block">
        @livewire('darkMode')
    </div>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 grid items-center h-full">
        <div class="flex flex-col md:flex-row mt-5">
            <div id="col-a" class="w-full md:w-1/2 text-center justify-center content-center lg:w-1/2 p-8">
                <div>
                    <img class="text-center mx-auto mb-12" src="{{ asset('img/core/maintenance-main.png') }}"
                        alt="Maintenance">
                    <h1 class="text-2xl font-bold tracking-tight my-4">Maintenance Mode</h1>
                    <p class="text-lg">We are currently performing maintenance on our site. We will be back shortly.</p>
                    <p class="mb-8">
                        <x-ui.social-network />
                    </p>
                </div>
            </div>
            <div id="col-b" class="w-full md:w-1/2 p-8">
                @livewire('mail.create-mail')
            </div>
        </div>
    </div>
</section>
