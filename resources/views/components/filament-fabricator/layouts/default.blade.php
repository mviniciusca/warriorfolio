<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warrioroflio</title>
    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Vite --}}
    @vite('resources/css/app.css')
    <!-- Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Livewire --}}
    <livewire:styles />
</head>

<body class="bg-black text-zinc-300 w-full h-screen text-sm sm:text-sm md:text-base overflow-x-hidden">
<div class="grid">
<x-header-section />
<x-hero-section />
<x-about-section />
<x-portfolio-section />
<x-customers-section />
<x-contact-section />
<x-footer />
</div>

<livewire:scripts />
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
