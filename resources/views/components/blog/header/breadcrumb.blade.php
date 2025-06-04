@props(['title' => null, 'message' => 'Back to Notes'])

<div>
    <div class="saturn-breadcrumb-back">
        <a class="saturn-breadcrumb-back"
            href="{{ config('app.url') . '/' . config('warriorfolio.app_blog_basepath', 'blog/') }}">
            <x-ui.ionicon :icon="'arrow-back-sharp'" class="w-4 h-4 group-hover:-translate-x-0.5 saturn-transition" />
            <span>{{ __($message) }}</span>
        </a>
    </div>
</div>
