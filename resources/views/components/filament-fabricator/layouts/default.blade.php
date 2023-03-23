<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Get title from app services provider -->
    <title>@if($settings !== null) {{ $settings->app_name }} @endif</title>
    <!-- Description -->
    <meta name="description" content="@if($settings !== null) {{ $settings->app_description }} @endif">
   <!-- Favion -->
    <link rel="icon" href="@if($settings !== null) {{ asset($settings->app_favicon) }} @endif">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Vite --}}
    @vite('resources/css/app.css')
    <!-- Alpine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>
    <livewire:styles />
</head>

<body
    class="h-screen w-full overflow-x-hidden bg-black text-sm text-zinc-300 sm:text-sm md:text-base">
    {{-- Header --}}
    <x-header-section />
    {{-- Hero --}}
    <x-hero-section />
    {{-- About --}}
    <x-about-section />
    {{-- Portfolio --}}
    <x-portfolio-section />
    {{-- Testimonials x Customers --}}
    <x-customers-section />
    {{-- Contact --}}
    <x-contact-section />
    {{-- Footer --}}
    <x-footer />
    <!--Scripts -->
    <livewire:scripts />
    <!-- Ionicons CDN -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<style>
    .main-gradient-text {
        background: linear-gradient(to right, #ff8c00, #ff69b4);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        color: transparent;
}
</style>
</body>

</html>
