@props(['posts', 'featured_posts', 'active_category' => null])

@if (! request('search') && $featured_posts->isNotEmpty())
    <x-blog.partials.featured :featuredPosts="$featured_posts" />
@endif

@if (! request('search'))
    <x-blog.partials.feed-tabs />
@endif

<x-blog.partials.posts-list :$posts :active-category="$active_category" />
