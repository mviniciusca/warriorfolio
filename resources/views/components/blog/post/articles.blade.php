@props(['current' => 'laravel-cloud-is-here', 'page' => null])
<div>
    <aside aria-label="Related articles" class="py-8 lg:py-24">
        <div class="mx-auto max-w-screen-xl px-4">
            <h2 class="mb-8 flex items-center justify-between text-2xl font-bold">{{ __('The Latest') }}
            </h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($articles as $item)
                    @if ($item->style === 'blog' && $item['slug'] != $page['slug'])
                        <article class="max-w-xs">
                            <a class="transition-all duration-200 hover:underline hover:opacity-80"
                                href="{{ env('APP_URL') . '/' . $item->slug }}">
                                @if ($item->img_cover)
                                    <x-curator-glider :media="$item->img_cover" class="mb-5 rounded-lg" />
                                @else
                                    <img class="mb-5 rounded-lg opacity-90" src="{{ asset('img/core/logo-app.svg') }}" />
                                @endif
                                <h2 class="text-md mb-2 font-bold tracking-tight">
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
