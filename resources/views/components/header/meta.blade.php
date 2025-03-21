{{--

View Component: Meta Tags
----------------------------------------------------------------
This component is responsible for rendering the meta tags for the website.
-------------------------------------------------------------------
Data:
App\View\Components\Header\Meta.php

--}}

<title>{{ ($app['name'] ?? config('app.name', 'Warriorfolio')) . ' - ' . ($meta['meta_title'] ?? '') }}</title>

@isset($meta['meta_author'])
    <meta name="author" content="{{ e($meta['meta_author']) }}">
@endisset

@isset($meta['meta_keywords'])
    <meta name="keywords" content="{{ e($meta['meta_keywords']) }}">
@endisset

@isset($meta['meta_description'])
    <meta name="description" content="{{ e($meta['meta_description']) }}">
@endisset

@if (!empty($design['favicon']))
    <link rel="icon" href="{{ asset('storage/' . $design['favicon']) }}" type="image/x-icon">
@else
    <link rel="icon" href="{{ asset('img/core/favicon.png') }}" type="image/x-icon">
@endif

@isset($google['meta_google_site_verification'])
    <meta name="google-site-verification" content="{{ e($google['meta_google_site_verification']) }}">
@endisset

@isset($meta['meta_robots'])
    <meta name="robots" content="{{ e($meta['meta_robots']) }}">
@endisset

@isset($google['google_analytics'])
    {!! $google['google_analytics'] !!}
@endisset

@isset($scripts['header_scripts'])
    {!! $scripts['header_scripts'] !!}
@endisset
