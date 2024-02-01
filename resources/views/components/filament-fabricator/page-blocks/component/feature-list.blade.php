@aware(['page'])
@props(['features'=> null, 'is_active' => true])

@if($is_active)
<section>
    <div class="px-2 py-2 md:py-0">
        <div class="mx-auto max-w-7xl">
            <section>
                <div class="mx-auto max-w-screen-xl px-4 py-4 sm:py-8 lg:px-6">
                    <div class="space-y-8 text-center md:grid md:grid-cols-2 md:gap-12 md:space-y-0 lg:grid-cols-3">
                        @foreach ($features as $item)
                        <div>
                            <div class="mx-auto mb-4 flex items-center justify-center">
                                <ion-icon class="h-9 w-9" name="{{ $item['icon'] }}">
                                </ion-icon>
                            </div>
                            <h3 class="mb-4 text-lg font-bold">{{ $item['title'] }}</h3>
                            <p class="text-md opacity-70">
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
