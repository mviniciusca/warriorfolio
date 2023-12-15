@if($meta->meta_title)
<title>{{ $meta->name }} - {{ $meta->meta_title }}</title>
@endif
@if($meta->favicon)
<link rel="shortcut icon" href="{{ asset('storage/' . $meta->favicon) }}" />
@endif
@if($meta->meta_description)
<meta name="description" content="{{ $meta->meta_description }}" />
@endif
@if($meta->meta_keywords)
<meta name="keywords" content="{{ $meta->meta_keywords }}" />
@endif
<meta name="author" content="{{ $meta->meta_author }}" />
@if($meta->meta_robots)
<meta name="robots" content="{{ $meta->meta_robots }}" />
@endif
@if($meta->meta_google_site_verification)
<meta name="google-site-verification" content="{{ $meta->meta_google_site_verification }}" />
@endif
@if($meta->google_analytics)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $meta->google_analytics }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $meta->google_analytics }}');
</script>
@endif
@if($meta->header_scripts)
{!! $meta->header_scripts !!}
@endif
