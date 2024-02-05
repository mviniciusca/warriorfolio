@if($meta->name || $meta->meta_title)
<title>{{ $meta->name . ' ' . $meta->meta_title }}</title>
@endif
<link rel="shortcut icon"
    href="{{ $meta->favicon ? asset('storage/' . $meta->favicon) : asset('img/core/favicon.png') }}" />
@if($meta->meta_description)
<meta name="description" content="{{ $meta->meta_description }}" />
@endif
@if($meta->meta_keywords)
<meta name="keywords" content="{{ $meta->meta_keywords }}" />
@endif
@if($meta->meta_author)
<meta name="author" content="{{ $meta->meta_author }}" />
@endif
@if($meta->meta_robots)
<meta name="robots" content="{{ $meta->meta_robots }}" />
@endif
@if($meta->meta_google_site_verification)
<meta name="google-site-verification" content="{{ $meta->meta_google_site_verification }}" />
@endif
@if($meta->google_analytics)
{!! $meta->google_analytics !!}
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
@if($meta->header_scripts)
{!! $meta->header_scripts !!}
@endif
