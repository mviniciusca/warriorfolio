@props([
'maintenance' => false,
'discovery' => false,
'bodyClass' => '',
])

<!DOCTYPE html>
<html class="{{ session('theme', 'light') == 'dark' ? 'dark' : '' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-core.partials.head />
    @if (isset($header))
    {{ $header }}
    @endif
</head>

<body {{ $attributes->merge(['class' => $bodyClass]) }}>
    @if (!$maintenance || ($discovery && auth()->user()))
    <x-core.modules.over />
    {{ $slot }}
    @if (isset($footer))
    {{ $footer }}
    @endif
    @endif
    @if ($maintenance && (!$discovery || !auth()->user()))
    <x-maintenance.section />
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
