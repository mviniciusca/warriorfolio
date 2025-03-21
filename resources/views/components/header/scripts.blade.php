{{--

View Component: Header Section Scripts
----------------------------------------------------------------
This component is responsible for rendering the scripts for the header section of the website.
-------------------------------------------------------------------
Data:
There is no data passed to this component.

--}}

<x-header.google-fonts />
<link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
@filamentStyles
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('notifications')
