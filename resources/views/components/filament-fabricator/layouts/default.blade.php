<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : ''  }}">

<head>
    <x-header.meta />
    {{-- Google Fonts CDN --}}
    <x-header.google-fonts />
    {{-- Swiper CDN --}}
    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- Iconicons CDN --}}
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    {{-- Vite --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
@livewire('notifications')

<body
    class="antialiased overflow-x-hidden scroll-smooth text-secondary-600 bg-secondary-50 dark:bg-secondary-900  dark:text-secondary-100">
    @if(!$maintenance)
    <x-ui.chatbox />
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    @endif
    {{-- Ionicons CDN --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    @filamentScripts
    @vite('resources/js/app.js')
</body>
@if($maintenance)
<x-maintenance.section />
@endif

</html>
