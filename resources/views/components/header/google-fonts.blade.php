{{--

Component: Google Fonts
----------------------------------------------------------------
This component is responsible for rendering the Google Fonts for the website.
-------------------------------------------------------------------
Data:
App\View\Components\Header\GoogleFonts.php

--}}
<!-- Google Fonts -->
@if (data_get($fonts, 'google.fonts_code') && data_get($fonts, 'google.font_name'))
{!! data_get($fonts, 'google.fonts_code') !!}
<style>
    body {
        font-family: "{{ e(data_get($fonts, 'google.font_name')) }}",
        sans-serif;
    }
</style>
@else
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
<link as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
@endif
