@props(['data' => null])

@if ($data->blog['is_active'] ?? false)
    <section id="blog-header-components" class="w-full overflow-hidden rounded-xl">
        <div class="flex flex-initial items-center gap-5">
            @if ($data->blog['is_logo_active'] ?? true)
                <div
                    class="hidden h-16 w-16 overflow-hidden rounded-lg bg-secondary-100/50 object-cover object-center p-2 dark:bg-secondary-900 sm:block sm:h-24 sm:w-24">
                    @if ($data->blog['logo'] ?? false)
                        <x-curator-glider
                            class="h-20 w-20 overflow-hidden object-cover object-center {{ ($data->blog['is_invert_logo'] ?? false) ? 'invert-0 dark:invert' : ''}}"
                            :media="$data->blog['logo']" />
                    @else
                        <img class="invert dark:invert-0" src="{{ asset('img/core/profile-picture.png') }}" alt="warriorfolio-logo">
                    @endif
                </div>
            @endif
            <div id="blog-name-group">
                @isset($data->blog['name'])
                    <p class="text-3xl dg font-bold leading-none tracking-tighter">
                        {!! $data->blog['name'] !!}
                    </p>
                @endisset
                @isset($data->blog['description'])
                    <p class="py-2 text-sm opacity-70">
                        {!! $data->blog['description'] !!}
                    </p>
                @endisset
            </div>
        </div>
    </section>
@endif
