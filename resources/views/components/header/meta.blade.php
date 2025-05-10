<!-- Meta Tags -->
<title>{{ $metaTitle ?? 'Default Title' }}</title>
<meta name="description" content="{{ $metaDescription ?? 'Default description' }}">
<meta name="keywords" content="{{ $metaKeywords ?? 'Default keywords' }}">
<meta name="author" content="{{ $metaAuthor ?? 'Default author' }}">
<meta name="robots" content="index, follow">
<!-- Favicon -->
<link rel="icon" href="{{ $favicon ? asset('storage/' . $favicon) : asset('favicon.ico') }}" type="image/x-icon">
@if($headerScripts)
<!-- Header Scripts -->
{!! $headerScripts ?? null !!}
@endif
