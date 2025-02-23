@if ($info['module_is_active'])
    <x-core.layout>
        <x-slot name="module_title">
            {{ $info['header_title'] }}
            <x-slot name="button_header">
                <a href="{{ $info['button_url'] }}">
                    {{ $info['button'] }}
                </a>
            </x-slot>
        </x-slot>
        <x-slot name="module_subtitle">
            {{ $info['header_subtitle'] }}
        </x-slot>
        <section class="mt-8">
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach ($posts as $item)
                    <x-blog.post.card-block :$item />
                @endforeach
            </div>
            </div>
        </section>
    </x-core.layout>
@endif
