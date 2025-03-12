<div>
    @if ($hero_core ?? false)
    <x-hero.section />
    @endif

    @if($blog_core ?? false)
    <x-blog.featured-posts />
    @endif

    @if ($about_core ?? false)
    <x-about.section />
    @endif

    @if ($portfolio_core ?? false)
    <x-project.section />
    @endif

    @if ($clients_core ?? false)
    <x-client.section />
    @endif

    @if ($contact_core ?? false)
    <x-contact.section />
    @endif

    @if ($newsletter_core ?? false)
    <x-newsletter.section />
    @endif
</div>
