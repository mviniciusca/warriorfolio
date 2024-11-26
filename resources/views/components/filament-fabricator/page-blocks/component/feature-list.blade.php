@aware(['page'])
@props(['features'=> null, 'is_active' => null, 'is_center' => null])

@if($is_active)
<x-core.layout>
    <section>
        <div class="mx-auto pb-8">
            <div class="{{ $is_center ? 'text-center' : 'text-left' }} grid md:grid-cols-3 lg:grid-cols-3 gap-2">
                @foreach ($features as $key => $item)
                <div
                    class="icon-card border p-8 hover:dark:bg-secondary-950 dark:bg-secondary-950/50 hover:-mt-5 hover:z-10 min-h-60 opacity-90 hover:opacity-100 transition-all duration-50 hover:border-secondary-500 dark:border-secondary-800 border-secondary-200">

                    <div class="mx-auto mb-2 flex {{ $is_center ? 'items-center' : 'items-start' }}
                            {{ $is_center ? 'justify-center' : 'justify-normal' }}">
                        <ion-icon class="h-10 w-10" name="{{ $item['icon'] }}"></ion-icon>
                    </div>
                    <h3 class="mb-2 text-base leading-tight">{!! $item['title'] !!}</h3>
                    <p class="text-sm opacity-80">
                        {!! $item['description'] !!}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-core.layout>
@endif