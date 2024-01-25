@if($fonts->google_fonts_code && $fonts->google_fonts_name)
{!! $fonts->google_fonts_code !!}
<style>
    body {
        font-family: "{{ $fonts->google_fonts_name }}",
        sans-serif;
    }
</style>
@else
<link rel=" preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
@endif