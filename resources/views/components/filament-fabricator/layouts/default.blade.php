<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : ''  }}">

<head>
    <x-header.meta />
    <x-header.scripts />
</head>

<body class="app-core" id="app">
    <x-header.alerts />
    {{-- App Default Core  --}}
    @if(!$maintenance || $discovery && auth()->user())
    <x-ui.background />
    <x-ui.chatbox />
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    @endif
    {{-- End App Default Core --}}
    {{-- Maintenance Mode --}}
    @if($maintenance && (!$discovery || !auth()->user()))
    <x-maintenance.section />
    @endif
    {{-- End Maintenance Mode --}}
    {{-- Body Scripts --}}
    <x-header.body-scripts />
    {{-- End Body Scripts --}}
</body>

</html>
