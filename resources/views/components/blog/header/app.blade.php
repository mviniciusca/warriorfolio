@props(['data' => null])

@if ($data->blog['is_active'] ?? false)
    <section id="blog-header-components"
        class="p-21 w-full rounded-xl bg-secondary-200/20 p-5 py-12 dark:bg-secondary-950/15">
        <div class="flex flex-initial items-center gap-2">
            @if ($data->blog['is_logo_active'] ?? true)
                <div
                    class="h-32 w-32 overflow-hidden rounded-lg bg-secondary-200/50 object-cover object-center p-2 shadow-lg dark:bg-secondary-800">
                    @if ($data->blog['logo'] ?? false)
                        <x-curator-glider class="h-28 w-28 overflow-hidden object-cover object-center"
                            :media="$data->blog['logo']" />
                    @else
                        <img class="invert dark:invert-0" src="{{ asset('img/core/profile-picture.png') }}"
                            alt="warriorfolio-logo">
                    @endif
                </div>
            @endif
            <div id="blog-name-group">
                @isset($data->blog['name'])
                    <p class="text-5xl font-semibold leading-none tracking-tighter">
                        {!! $data->blog['name'] !!}
                    </p>
                @endisset
                @isset($data->blog['description'])
                    <p class="py-2 text-base opacity-70">
                        {!! $data->blog['description'] !!}
                    </p>
                @endisset
            </div>
        </div>
    </section>
@endif
