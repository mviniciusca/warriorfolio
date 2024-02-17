@aware(['page'])
@props(['features'=> null, 'is_active' => null, 'is_center' => null])

@if($is_active)
<section>
    <div class="mx-auto max-w-7xl px-5">
        <div class="mx-auto max-w-screen-xl py-4">
            <div
                class="space-y-8 {{ $is_center ? 'text-center' : 'text-left' }} md:grid md:grid-cols-3 md:gap-12 md:space-y-0 lg:grid-cols-3">
                @foreach ($features as $item)
                <div>
                    <div class="mx-auto mb-2 flex {{ $is_center ? 'items-center' : 'items-start' }}
                            {{ $is_center ? 'justify-center' : 'justify-normal' }}">
                        <ion-icon class="h-10 w-10" name="{{ $item['icon'] }}"></ion-icon>
                    </div>
                    <h3 class="mb-2 text-lg font-bold">{{ $item['title'] }}</h3>
                    <p class="text-sm opacity-80">
                        {{ $item['description'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
