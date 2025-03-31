@props(['title' => null])

<div>
    <div class="mb-8 inline-block">
        <a class="flex items-center gap-1 transition-all duration-300 hover:opacity-90 active:opacity-50 md:hover:-ml-5"
            href="{{ config('app.url') . '/' . config('warriorfolio.app_blog_basepath', 'blog/') }}">
            <x-ui.ionicon :icon="'arrow-back-sharp'" class="text-lg" />
            <span class="font-semibold text-sm">{{ __('Back to the Notes') }}</span>
        </a>
    </div>
</div>
