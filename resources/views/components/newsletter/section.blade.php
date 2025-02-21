@if ($module->newsletter)
    <x-core.layout>
        <div class="mx-auto px-4">
            <div
                class="flex flex-wrap items-center justify-center rounded-lg border border-white bg-secondary-50 px-4 py-6 text-center dark:border-secondary-900 dark:bg-secondary-900 lg:py-12">
                <div class="image w-full px-4 lg:w-1/4">
                    <img class="mx-auto max-h-48"
                        src="{{ data_get($data, 'mailing.image') ? asset('storage/' . $data->mailing['image']) : asset('img/core/svg/developer.svg') }}"
                        alt="newsletter-image" />
                </div>
                <div class="text w-full p-4 lg:w-2/4">
                    <span class="text-2xl font-bold leading-tight tracking-tighter md:text-4xl lg:text-5xl">
                        <p>
                            {!! $data->mailing['section_title'] !!}
                        </p>
                        <p class="text-xs font-normal tracking-normal md:text-base">
                            {!! $data->mailing['section_subtitle'] !!}
                        </p>
                    </span>
                </div>

                <div class="form mx-auto flex flex-wrap justify-start text-center lg:w-1/4 lg:text-left">
                    <livewire:newsletter :buttonText="$data->mailing['button_text']">
                </div>

            </div>
        </div>
    </x-core.layout>
@endif
