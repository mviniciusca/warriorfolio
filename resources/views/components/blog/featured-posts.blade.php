@props(['posts', 'module_blog', 'info'])

@if ($posts && $module_blog)
    @if ($info['module_is_active'] ?? false)
        <x-core.layout>

            <x-slot name="module_title">

                @if($info['header_title'] && ($info['is_heading_visible'] ?? true))
                    {{ $info['header_title'] ?? null}}
                @endif

                @if ($info['button'] ?? null)
                    <x-slot name="button_header">
                        <a href="{{ $info['button_url'] ?? null }}">
                            {{ $info['button'] ?? null }}
                        </a>
                    </x-slot>
                @endif

            </x-slot>

            @if($info['header_subtitle'] && ($info['is_heading_visible'] ?? true) ?? false)
                <x-slot name="module_subtitle">
                    {{ $info['header_subtitle'] ?? null }}
                </x-slot>
            @endif


            <section class="mt-8">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $item)
                        <x-blog.post.card-block :$item />
                    @endforeach
                </div>
                </div>
                @if ($posts->count() === 0)
                    <x-ui.empty-section :message="'No Posts Yet.'" :auth="'Create a new Post in your Dashboard.'" />
                @endif
            </section>
        </x-core.layout>
    @endif
@endif
