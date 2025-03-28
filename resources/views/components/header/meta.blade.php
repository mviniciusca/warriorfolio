{{--

View Component: Meta Tags
----------------------------------------------------------------
This component is responsible for rendering the meta tags for the website.
-------------------------------------------------------------------
Data:
App\View\Components\Header\Meta.php

--}}

<!-- Meta Tags -->
    <title>{{ ($app['name'] ?? config('app.name', 'Warriorfolio')) . ' - ' . ($meta['meta_title'] ?? '') }}</title>
@isset($meta['meta_author'])
    <meta content="{{ e($meta['meta_author']) }}" name="author">
@endisset
@isset($meta['meta_keywords'])
    <meta content="{{ e($meta['meta_keywords']) }}" name="keywords">
@endisset
@isset($meta['meta_description'])
    <meta content="{{ e($meta['meta_description']) }}" name="description">
@endisset
@if (!empty($design['favicon']))
    <link href="{{ asset('storage/' . $design['favicon']) }}" rel="icon" type="image/x-icon">
@else
    <link href="{{ asset('img/core/favicon.png') }}" rel="icon" type="image/x-icon">
@endif
@isset($google['meta_google_site_verification'])
    <meta content="{{ e($google['meta_google_site_verification']) }}" name="google-site-verification">
@endisset
@isset($meta['meta_robots'])
    <meta content="{{ e($meta['meta_robots']) }}" name="robots">
@endisset
@isset($google['google_analytics'])
    {!! $google['google_analytics'] !!}
@endisset
@isset($scripts['header_scripts'])
    {!! $scripts['header_scripts'] !!}
@endisset
