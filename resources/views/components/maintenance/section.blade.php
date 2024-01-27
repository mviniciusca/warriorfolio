<section class="bg-secondary-50 dark:bg-secondary-900 text-secondary-600 dark:text-secondary-50 h-screen w-full">
    <div class="absolute left-0 right-0 top-0 mt-5 text-center justify-center items-center inline-block">
        @livewire('darkMode')
    </div>
    <div class="py-8 px-4 mx-auto max-w-screen-lg lg:py-16 lg:px-6 grid items-center h-full">
        <div class="flex flex-col md:flex-row mt-5 items-center">
            <div id="col-a" class="w-full md:w-1/2 text-center justify-center  content-center p-8
                {{ $maintenance->is_contact ? 'lg:w-1/2' : 'lg:w-full' }}">
                <div>
                    <img class="text-center mx-auto mb-12"
                        src="{{ $maintenance->image ? asset('storage/' . $maintenance->image) : asset('img/core/maintenance-main.png') }}"
                        alt="Maintenance">
                    <div id="maintenance-content" class="text-lg">
                        {!! $maintenance->content !!}
                    </div>
                    @if($maintenance->is_social)
                    <p class="mb-8">
                        <x-ui.social-network />
                    </p>
                    @endif
                </div>
            </div>
            @if($maintenance->is_contact)
            <div id="col-b" class="w-full md:w-1/2 p-8">
                @livewire('mail.create-mail')
            </div>
            @endif
        </div>
    </div>
</section>
