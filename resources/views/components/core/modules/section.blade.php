{{-- Core Core Module Decoupling --}}
<div>
    @foreach ($modules as $module)

    {{-- Hero Section as Coupled Module --}}
    @if($module->slug === 'hero')
    <x-themes.common.hero />
    @endif

    {{-- Blog as Coupled Module --}}
    @if($module->slug === 'blog')
    <x-blog.featured-posts />
    @endif

    {{-- About Me as Coupled Module --}}
    @if ($module->slug === 'about-me'))
    <x-themes.default.about />
    @endif

    {{-- Portfolio as Coupled Module --}}
    @if ($module->slug === 'portfolio')
    <x-themes.default.projects />
    @endif

    {{-- Clients as Coupled Module --}}
    @if ($module->slug === 'clients')
    <x-themes.default.clients />
    @endif

    {{-- Contact as Coupled Module --}}
    @if ($module->slug === 'contact')
    <x-themes.default.contact />
    @endif


    {{-- Newsletter as Coupled Module --}}
    @if ($module->slug === 'newsletter')
    <x-themes.default.newsletter />
    @endif

    @endforeach
</div>
