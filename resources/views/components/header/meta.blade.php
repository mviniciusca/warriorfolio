<title>{{ ( $app['name'] ?? env('APP_NAME')) . ' ' .($meta['meta_title'] ?? '') }}</title>


@isset($meta['meta_author'])
<meta name="author" content="{{ $meta['meta_author']}}">
@endisset

@isset($meta['meta_keywords'])
<meta name="keywords" content="{{ $meta['meta_keywords'] }}">
@endisset

@isset($meta['meta_description'])
<meta name="description" content="{{ $meta['meta_description'] }}">
@endisset



@isset($design['favicon'])
<link rel="icon"
    href="{{ $design['favicon'] ?  asset('storage/' . $design['favicon']) : asset('img/core/favicon.png')  }}"
    type="image/x-icon">
@endisset



@isset($google['meta_google_site_verification'])
<meta name="google-site-verification" content="{{ $google['meta_google_site_verification'] }}" />
@endisset

@isset( $meta['meta_robots'])
<meta name="robots" content="{{ $meta['meta_robots'] }}" />
@endisset

@isset($google['google_analytics'])
{!! $google['google_analytics'] !!}
@endisset



@isset($scripts['header_scripts'])
{!! $scripts['header_scripts'] !!}
@endisset