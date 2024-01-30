@aware(['page'])
@props(['features', 'attributes' => 'bg-white dark:bg-primary-800', 'is_active' => true])

@if($is_active)
<section class="{{ $attributes }}">
    <div class="px-2 py-2 md:py-0">
        <div class="mx-auto max-w-7xl">
            <section>
                <div class="mx-auto max-w-screen-xl px-4 py-4 sm:py-8 lg:px-6">
                    <div class="space-y-8 text-center md:grid md:grid-cols-2 md:gap-12 md:space-y-0 lg:grid-cols-3">
                        @foreach ($features as $item)
                        <div>
                            <div
                                class="mx-auto mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary-100 dark:bg-primary-900 lg:h-12 lg:w-12">
                                <ion-icon class="h-6 w-6 text-primary-500 dark:text-white" name="{{ $item['icon'] }}">
                                </ion-icon>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $item['title'] }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">
                                {{ $item['description'] }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endif
