@props(['current' => 'laravel-cloud-is-here', 'page' => null])
<div>
    <aside aria-label="Related articles" class="py-8 lg:py-24">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 flex items-center justify-between text-2xl font-bold">{{ __('The Latest') }}
            </h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($articles as $item )
                @if ($item->style === 'blog' && $item['slug'] != $page['slug'])
                <article class="max-w-xs">
                    <a class="hover:opacity-80 transition-all duration-200 hover:underline" href="{{ env('APP_URL') . '/' . $item->slug }}">
                       
                        <x-curator-glider :media="$item->img_cover" class="mb-5 rounded-lg" />
                        <h2 class="mb-2 text-md font-bold tracking-tight">
                            <p>{{ $item->title }}</p>
                        </h2>
                    </a>
                    </article>
                @endif
                @endforeach
            </div>
        </div>
      </aside>

</div>
