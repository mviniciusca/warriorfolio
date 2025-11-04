@props(['posts', 'featured_post'])

<!-- Featured Post (only show when not searching) -->
@if(!request('search') && $featured_post)
<x-blog.partials.featured :featuredPost="$featured_post" />
@endif

<!-- Posts List -->
<x-blog.partials.posts-list :$posts />
