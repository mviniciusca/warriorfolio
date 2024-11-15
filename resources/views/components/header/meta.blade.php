<title>{{ $app['name'] . ' - ' . $meta['meta_title'] }}</title>

@if($meta !== null)
@if($meta['meta_author'])
<meta name="author" content="{{ $meta['meta_author'] }}">
@endif
<meta name="keywords" content="{{ $meta['meta_keywords'] ? $meta['meta_keywords'] : __('Warriorfolio v2') }}">
<meta name="description"
    content="{{ $meta['meta_description'] ? $meta['meta_description'] : __('Building the what\'s next!') }}">
@endif

@if($design !== null)
<link rel="icon"
    href="{{ $design['favicon'] ?  asset('storage/' . $design['favicon']) : asset('img/core/favicon.png')  }}"
    type="image/x-icon">
@endif

@if($google !== null)
<meta name="google-site-verification" content="{{ $google['meta_google_site_verification'] }}" />
<meta name="robots" content="{{ $meta['meta_robots'] }}" />
{!! $google['google_analytics'] !!}
@endif

@if($scripts !== null)
{!! $scripts['header_scripts'] !!}
@endif