{{-- Core Core Module Decoupling --}}
<div>
    @if ($hero_core ?? false)
    <x-hero.section :global_visibility="true ?? false" />
    @endif

    @if($blog_core ?? false)
    <x-blog.featured-posts :global_visibility="true ?? false" />
    @endif

    @if ($about_core ?? false)
    <x-themes.default.about :global_visibility="true ?? false" />
    @endif

    @if ($portfolio_core ?? false)
    <x-themes.default.projects :global_visibility="true ?? false" />
    @endif

    @if ($clients_core ?? false)
    <x-themes.default.clients :global_visibility="true ?? false" />
    @endif

    @if ($contact_core ?? false)
    <x-contact.section :global_visibility="true ?? false" />
    @endif

    @if ($newsletter_core ?? false)
    <x-newsletter.section :global_visibility="true ?? false" />
    @endif
</div>
