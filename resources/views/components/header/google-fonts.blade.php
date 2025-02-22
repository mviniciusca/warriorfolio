@if (data_get($fonts, 'google.fonts_code') && data_get($fonts, 'google.font_name'))
    {!! data_get($fonts, 'google.fonts_code') !!}
    <style>
        body {
            font-family: "{{ data_get($fonts, 'google.font_name') }}",
                sans-serif;
        }
    </style>
@else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
@endif
