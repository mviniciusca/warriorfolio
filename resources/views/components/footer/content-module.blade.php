{{--

This is responsible for rendering the footer content inside Footer Section
of the website.
-------------------------------------------------------------------

--}}

<div class="py-8" id="footer-content">
    <div class="mx-auto p-4 py-6 text-sm lg:py-8">
        <div class="md:flex md:justify-between md:gap-12">
            <div class="mb-6 text-center md:mb-0 md:text-left">
                <x-ui.logo />
            </div>
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-10">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">{{ __('Pages') }}
                    </h2>
                    <ul class="space-y-4 text-sm font-medium">
                        @foreach ($navigation as $item)
                            @isset($item['content'])
                                @foreach ($item['content'] as $content)
                                    @if ($content['is_active'])
                                        <li>
                                            <a class="hover:underline" href="{{ $content['url'] }}"
                                                target="{{ $content['target'] }}">{!! $content['name'] !!}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endisset
                        @endforeach
                    </ul>
                </div>
                @if ($social != null)
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase">
                            {{ __('Follow') }}
                        </h2>
                        <ul class="space-y-4 font-medium">
                            @foreach ($social as $item)
                                @if ($item['is_active'])
                                    <li>
                                        <a class="hover:underline" href="{{ $item['profile_link'] }}"
                                            target="_blank">{{ ucfirst($item['social_network']) }}

                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr class="mx-auto my-6 border-secondary-500/20" />
    <div class="flex-wrap sm:flex sm:items-center sm:justify-between">
        <div class="order-4 sm:order-3">
            <div class="text-center text-sm md:text-left">
                © {{ date('Y') . ' - ' . data_get($setting, 'application.name', env('APP_NAME')) }}
            </div>
            <div class="mt-4 flex justify-center sm:hidden">
                <x-ui.social-network />
            </div>
        </div>
        <div class="order-3 mx-auto mt-4 hidden sm:order-4 sm:mx-0 sm:mt-0 sm:flex sm:justify-end">
            <x-ui.social-network />
        </div>
    </div>
</div>
