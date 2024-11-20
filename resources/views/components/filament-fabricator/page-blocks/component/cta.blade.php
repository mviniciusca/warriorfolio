@aware(['page'])
@props([ 'content' => null, 'is_active' => null])

@if($is_active)
<section>
    @foreach ($content as $item )

    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">

        @if(data_get($item, 'image'))
        <img class="w-full order-{{ $item['is_invert'] ? '1' : '2' }} rounded-lg opacity-100 hover:opacity-90"
            src="{{ asset('storage/'. data_get($item, 'image')) }}" alt="dashboard image">
        @endif

        <div class="mt-4 md:mt-0">
            @if(data_get($item, 'title'))
            <h2 class="mb-4 text-4xl tracking-tighter font-extrabold">{{ data_get($item, 'title') }}</h2>
            @endif

            @if(data_get($item, 'description'))
            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">{{ data_get($item, 'description') }}
            </p>
            @endif

            @if(data_get($item, 'button_text') && data_get($item, 'button_url'))
            <a href="{{ data_get($item, 'button_url') ?? '#'}}">
                <x-ui.button type='submit' class="mt-4 px-4 py-3" icon='chevron-forward-outline'>
                    {{ data_get($item, 'button_text') }}
                </x-ui.button>
            </a>
            @endif


        </div>
    </div>

    @endforeach
</section>
@endif