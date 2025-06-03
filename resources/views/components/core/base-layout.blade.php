@aware(['page'])

@props([
'maintenance' => false,
'discovery' => false,
'bodyClass' => '',
])

<!DOCTYPE html>
<html class="{{ session('theme', 'light') == 'dark' ? 'dark' : '' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-core.partials.head :$page />
    @if (isset($header))
    {{ $header }}
    @endif
</head>


<body id="main-app" {{ $attributes->merge(['class' => $bodyClass]) }}>
    @if (!$maintenance || ($discovery && auth()->user()))
    <x-core.modules.overlay-apps />
    {{ $slot }}
    @if (isset($footer))
    {{ $footer }}
    @endif
    @endif
    @if ($maintenance && (!$discovery || !auth()->user()))
    <x-themes.common.maintenance />
    @endif
    <!-- Body Scripts -->
    @isset($scripts['body_scripts'])
    {!! $scripts['body_scripts'] !!}
    @endisset
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
