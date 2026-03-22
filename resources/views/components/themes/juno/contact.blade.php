@php
    $hours = $content['business_hours'] ?? $content['business_hour'] ?? null;
    $hasContactDetails = ! empty(array_filter([
        data_get($content, 'address'),
        data_get($content, 'phone'),
        data_get($content, 'email'),
        $hours,
    ]));
@endphp

<div class="saturn-y-section px-4 pt-12 md:pt-16">
    @if($is_heading_visible)
        <x-themes.juno.partials.header :$title :$subtitle />
    @endif

    @if(isset($content['google_map']))
        <div class="mt-10 space-y-8">
            <div class="overflow-hidden rounded-xl border saturn-border">
                <div class="relative aspect-[21/9] min-h-[240px] w-full md:min-h-[320px]">
                    <iframe src="{{ $content['google_map'] }}" class="absolute inset-0 h-full w-full border-0 grayscale"
                        allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="{{ __('Map') }}">
                    </iframe>
                </div>
            </div>
            <div class="grid gap-10 lg:grid-cols-2 lg:gap-12">
                <div class="rounded-xl border saturn-border bg-black/[0.02] px-6 py-6 dark:bg-white/[0.02]">
                    @if ($hasContactDetails)
                        <dl class="space-y-6 text-sm">
                            @isset($content['address'])
                                <div>
                                    <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Address') }}</dt>
                                    <dd class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $content['address'] !!}</dd>
                                </div>
                            @endisset
                            @isset($content['phone'])
                                <div>
                                    <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Phone') }}</dt>
                                    <dd class="mt-2 saturn-text">{!! $content['phone'] !!}</dd>
                                </div>
                            @endisset
                            @isset($content['email'])
                                <div>
                                    <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Email') }}</dt>
                                    <dd class="mt-2">
                                        <a href="mailto:{{ $content['email'] }}" class="saturn-text underline-offset-2 hover:underline">{{ $content['email'] }}</a>
                                    </dd>
                                </div>
                            @endisset
                            @if ($hours)
                                <div>
                                    <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Business hours') }}</dt>
                                    <dd class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $hours !!}</dd>
                                </div>
                            @endif
                        </dl>
                    @else
                        <div class="flex min-h-[200px] items-center justify-center py-4 md:min-h-[260px]">
                            <x-ui.empty-address :data="$content" />
                        </div>
                    @endif
                </div>
                <div>
                    <p class="mb-6 text-sm saturn-text-accent">{{ __('Send us a message and we will get back to you.') }}</p>
                    <livewire:mail.create-mail :is-section-filled-inverted="$is_section_filled_inverted" />
                </div>
            </div>
        </div>
    @else
        <div class="mt-10 grid gap-10 lg:grid-cols-2 lg:gap-12">
            <div class="rounded-xl border saturn-border bg-black/[0.02] px-6 py-6 dark:bg-white/[0.02]">
                @if ($hasContactDetails)
                    <dl class="space-y-6 text-sm">
                        @isset($content['address'])
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Address') }}</dt>
                                <dd class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $content['address'] !!}</dd>
                            </div>
                        @endisset
                        @isset($content['phone'])
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Phone') }}</dt>
                                <dd class="mt-2 saturn-text">{!! $content['phone'] !!}</dd>
                            </div>
                        @endisset
                        @isset($content['email'])
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Email') }}</dt>
                                <dd class="mt-2">
                                    <a href="mailto:{{ $content['email'] }}" class="saturn-text underline-offset-2 hover:underline">{{ $content['email'] }}</a>
                                </dd>
                            </div>
                        @endisset
                        @if ($hours)
                            <div>
                                <dt class="text-xs font-medium uppercase tracking-wider saturn-text-accent">{{ __('Business hours') }}</dt>
                                <dd class="mt-2 saturn-text prose prose-sm max-w-none dark:prose-invert">{!! $hours !!}</dd>
                            </div>
                        @endif
                    </dl>
                @else
                    <div class="flex min-h-[200px] items-center justify-center py-4 md:min-h-[260px]">
                        <x-ui.empty-address :data="$content" />
                    </div>
                @endif
            </div>
            <div>
                <p class="mb-6 text-sm saturn-text-accent">{{ __('Send us a message and we will get back to you.') }}</p>
                <livewire:mail.create-mail :is-section-filled-inverted="$is_section_filled_inverted" />
            </div>
        </div>
    @endif
</div>
