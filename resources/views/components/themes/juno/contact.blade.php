<div class="px-4">
    @if($is_heading_visible)
    <x-themes.juno.partials.header :$title :$subtitle />
    @endif
    @if(isset($content['google_map']))
    <div class="relative min-h-[600px]">
        <!-- Google Maps Background -->
        <div
            class="absolute grayscale inset-0 w-full h-full pointer-events-none hover:pointer-events-auto transition-all duration-300">
            <iframe src="{{ $content['google_map'] }}" class="w-full h-full border-0" allowfullscreen="false"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <!-- Contact Info Overlay -->
        <div class="relative z-10 p-8 grid grid-cols-1 md:grid-cols-2">
            <div class="hidden md:block"></div>
            <div
                class="max-w-md bg-white/95 dark:bg-secondary-800/95 rounded-lg shadow-lg p-8 backdrop-blur-sm ml-auto">
                <div class="space-y-4">
                    @isset($content['address'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="location-outline" />
                        <div>
                            <p class="text-sm font-medium">{{ __('Address') }}</p>
                            <p>{!! $content['address'] ?? null !!}</p>
                        </div>
                    </div>
                    @endisset

                    @isset($content['phone'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="call-outline" />
                        <div>
                            <p class="text-sm font-medium">Phone</p>
                            <p class="mt-1 text-sm">{!! $content['phone'] !!}</p>
                        </div>
                    </div>
                    @endisset

                    @isset($content['email'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="mail-outline" />
                        <div>
                            <p class="text-sm font-medium">Email</p>
                            <p class="mt-1 text-sm">{{ $content['email'] ?? null }}</p>
                        </div>
                    </div>
                    @endisset

                    @isset($content['business_hour'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="time-outline" />
                        <div>
                            <p class="text-sm font-medium">Business Hours</p>
                            <p class="mt-1 text-sm">{!! $content['business_hour'] !!}</p>
                        </div>
                    </div>
                    @endisset
                </div>

                <!-- Contact Form -->
                <div class="mt-6">
                    @livewire('mail.create-mail')
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="grid gap-8 md:grid-cols-2">
        <!-- Contact Info Column -->
        <div class="space-y-6">
            <div>
                <div class="space-y-4">
                    @isset($content['address'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="location-outline" />
                        <div>
                            <p class="text-sm font-medium">
                                {{ __('Address') }}</p>
                            <p>{!! $content['address'] ?? null !!} </p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['phone'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="call-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Phone</p>
                            <p class="mt-1 text-sm  ">
                                {!! $content['phone'] !!}</p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['email'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="mail-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Email</p>
                            <p class="mt-1 text-sm  ">
                                {{ $content['email'] ?? null }}</p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['business_hour']))
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="time-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Business Hours</p>
                            <p class="mt-1 text-sm">
                                {!! $content['business_hour'] !!}
                            </p>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <!-- Contact Form Column -->
        <div>
            @livewire('mail.create-mail')
        </div>
    </div>
    @endif
</div>
