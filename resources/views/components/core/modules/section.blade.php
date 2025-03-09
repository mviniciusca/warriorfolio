<div>
    @if ($hero_core)
        <x-hero.section />
    @endif

    @if ($about_core)
        <x-about.section />
    @endif

    @if ($portfolio_core)
        <x-project.section />
    @endif

    @if ($clients_core)
        <x-client.section />
    @endif

    @if ($contact_core)
        <x-contact.section />
    @endif

    @if ($newsletter_core)
        <x-newsletter.section />
    @endif
</div>
