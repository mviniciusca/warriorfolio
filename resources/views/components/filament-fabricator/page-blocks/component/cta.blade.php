@aware(['page'])
@props(['content' => null, 'is_active' => null, 'is_invert' => false])

@if ($is_active)
    <x-core.layout>
        <section>
            @foreach ($content as $item)
                <div
                    class="mx-auto max-w-screen-xl items-center gap-8 px-4 py-8 sm:py-16 md:grid md:grid-cols-2 lg:px-6 xl:gap-16">
                    @if (data_get($item, 'image'))
                        <img class="order-{{ $item['is_invert'] ? '1' : '0' }} w-full max-w-96 rounded-lg opacity-100 hover:opacity-90"
                            src="{{ asset('storage/' . data_get($item, 'image')) }}" alt="dashboard image">
                    @endif
                    <div class="mt-4 md:mt-0">
                        @if (data_get($item, 'title'))
                            <h2 class="mb-4 text-4xl font-extrabold tracking-tighter">{{ data_get($item, 'title') }}</h2>
                        @endif
                        @if (data_get($item, 'description'))
                            <p class="mb-6 font-light md:text-lg">
                                {{ data_get($item, 'description') }}
                            </p>
                        @endif
                        @if (data_get($item, 'button_text') && data_get($item, 'button_url'))
                            <a href="{{ data_get($item, 'button_url') ?? '#' }}">
                                <x-ui.button type='submit' class="mt-4 px-4 py-3" icon='chevron-forward-outline'>
                                    {{ data_get($item, 'button_text') }}
                                </x-ui.button>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </section>
    </x-core.layout>
@endif
