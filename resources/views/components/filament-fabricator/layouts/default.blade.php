<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}
@if(session('theme') == 'dark')
class=" dark @endif ">
<head>
    <x-header.meta />
    {{-- Google Fonts --}}
    <link rel=" preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
{{-- Slider CDN --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- Iconicons --}}
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
    <x-ui.chatbox />
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    {{-- Ionicons CDN --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
