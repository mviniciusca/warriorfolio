@if($is_active)
<x-core.layout :$is_filled :$with_padding :$module_name :$button_header :$button_url :$is_centered :$title :$subtitle
    :$is_section_filled_inverted :$is_heading_visible :$button_icon :$module_slug>
    <section class="mx-auto border-t saturn-border pt-10 md:pt-12" id="contact-wrapper">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
            {{-- Info / map --}}
            <div class="lg:col-span-7">
                @if ($content['google_map'] ?? null)
                    <div class="overflow-hidden rounded-xl border saturn-border">
                        <div class="relative aspect-[16/10] min-h-[280px] w-full lg:aspect-auto lg:min-h-[420px]">
                            <iframe class="absolute inset-0 h-full w-full grayscale contrast-[1.05] opacity-90"
                                frameborder="0" marginheight="0" marginwidth="0" scrolling="no"
                                src="{{ $content['google_map'] }}" title="{{ __('Map') }}" width="100%" height="100%">
                            </iframe>
                        </div>
                        @if (($content['address'] ?? null) || ($content['email'] ?? null) || ($content['phone'] ?? null))
                            <div class="divide-y saturn-border border-t saturn-border bg-black/[0.02] px-6 py-5 text-sm dark:bg-white/[0.02]">
                                @if ($content['address'] ?? null)
                                    <div class="pb-5">
                                        <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Address') }}</p>
                                        <div class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $content['address'] !!}</div>
                                    </div>
                                @endif
                                <div class="flex flex-wrap gap-x-10 gap-y-4 pt-5">
                                    @if ($content['email'] ?? null)
                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('E-mail') }}</p>
                                            <a href="mailto:{{ $content['email'] }}" class="mt-2 inline-block saturn-text underline-offset-2 hover:underline">{{ $content['email'] }}</a>
                                        </div>
                                    @endif
                                    @if ($content['phone'] ?? null)
                                        <div>
                                            <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Phone') }}</p>
                                            <p class="mt-2 saturn-text">{{ '+' . config('MOBILE_COUNTRY_CODE') . ' ' . $content['phone'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="space-y-0 rounded-xl border saturn-border bg-black/[0.02] dark:bg-white/[0.02]">
                        @if ($content['address'] ?? null)
                            <div class="border-b saturn-border px-6 py-5">
                                <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Headquarter') }}</p>
                                <div class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $content['address'] !!}</div>
                                @if ($content['business_hours'] ?? null)
                                    <div class="mt-4 saturn-text-accent prose prose-sm max-w-none dark:prose-invert">{!! $content['business_hours'] !!}</div>
                                @endif
                            </div>
                        @endif
                        @if ($content['phone'] ?? null)
                            <div class="border-b saturn-border px-6 py-5">
                                <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Phone') }}</p>
                                <p class="mt-2 saturn-text">{{ '+' . config('MOBILE_COUNTRY_CODE') . ' ' . $content['phone'] }}</p>
                            </div>
                        @endif
                        @if ($content['email'] ?? null)
                            <div class="border-b saturn-border px-6 py-5">
                                <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Mail') }}</p>
                                <a href="mailto:{{ $content['email'] }}" class="mt-2 inline-block saturn-text underline-offset-2 hover:underline">{{ $content['email'] }}</a>
                            </div>
                        @endif
                        @if ($socialNetwork)
                            <div class="px-6 py-5">
                                <p class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Follow') }}</p>
                                <div class="mt-3">
                                    <x-ui.social-network justify="start" />
                                </div>
                            </div>
                        @endif
                        @if (
                            ($content['address'] ?? null) == null
                            && (($content['phone'] ?? null) == null && ($content['email'] ?? null) == null)
                        )
                            <div class="px-6 py-5">
                                <x-ui.empty-address :data="$content" />
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            {{-- Form --}}
            <div class="lg:col-span-5">
                <p class="mb-6 text-sm saturn-text-accent">{{ __('Send us a message and we will get back to you.') }}</p>
                <livewire:mail.create-mail :$is_section_filled_inverted />
            </div>
        </div>
    </section>
</x-core.layout>
@endif
