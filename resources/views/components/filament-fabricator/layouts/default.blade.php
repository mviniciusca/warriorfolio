<!DOCTYPE html>
<html lang="en">

<head>
    <x-header.meta />
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- Vite --}}
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-zinc-900 dark:text-zinc-500">
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
</body>

</html>
