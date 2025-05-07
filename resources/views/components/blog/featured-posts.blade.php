@props([
'posts',
'module_blog',
'info',
'title' => $info['header_title'] ?? null,
'subtitle' => $info['header_subtitle'] ?? null,
'is_heading_visible' => $info['is_heading_visible'] ?? false,
'button_header' => $info['button'] ?? null,
'button_url' => $info['button_url'] ?? null,
])

@if ($posts && $module_blog)
@if ($info['module_is_active'] ?? false)
<x-core.layout :with_padding="false">
    <x-core.layout.section-header :$title :$subtitle :$is_heading_visible :$button_header :$button_url />
    <div class="my-12">
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
    </div>
</x-core.layout>
@endif
@endif
