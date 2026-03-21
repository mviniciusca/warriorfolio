<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="ie=edge" http-equiv="X-UA-Compatible">
<title>{{ $metaTitle ?? 'Default Title' }}</title>
<meta name="description" content="{{ $metaDescription ?? 'Default description' }}">
<meta name="keywords" content="{{ $metaKeywords ?? 'Default keywords' }}">
<meta name="author" content="{{ $metaAuthor ?? 'Default author' }}">
<meta name="robots" content="index, follow">
<!-- Favicon -->
<link rel="icon" href="{{ $favicon ? asset('storage/' . $favicon) : asset('img/core/favicon.png') }}"
    type="image/x-icon">
@if($headerScripts)
<!-- Header Scripts -->
{!! $headerScripts ?? null !!}
@endif
<link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
@if($googleSiteVerification)
<!-- Google Site Verification -->
{!! $googleSiteVerification !!}
@endif
@if($googleAnalytics)
<!-- Google Analytics -->
{!! $googleAnalytics !!}
@endif
<!-- Scripts -->
@filamentStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])
@if (filled($googleFontsCode))
<!-- Google Fonts -->
{!! $googleFontsCode !!}
<style>
    html,
    body {
        font-family: '{{ $googleFonts }}', 'Geist', sans-serif;
    }
</style>
@endif
