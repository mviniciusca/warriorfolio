{{--

This is responsible for rendering the footer content inside Footer Section
of the website.
-------------------------------------------------------------------

--}}

<section class="py-8" id="footer-content">
    <div class="mx-auto p-4 py-6 text-sm lg:py-8">
        <div class="md:flex md:justify-between md:gap-12">
            <div class="mb-6 md:mb-0 text-center md:text-left">
                <x-ui.logo />
            </div>
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-10">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">{{ __('Pages') }}
                    </h2>
                    <ul class="text-sm font-medium space-y-4">
                        @foreach ($navigation as $item)
                            @isset($item['content'])
                                @foreach ($item['content'] as $content)
                                    @if ($content['is_active'])
                                        <li>
                                            <a target="{{ $content['target'] }}" href="{{ $content['url'] }}"
                                                class="hover:underline">{!! $content['name'] !!}</a>
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
                        <ul class="font-medium space-y-4">
                            @foreach ($social as $item)
                                @if ($item['is_active'])
                                    <li>
                                        <a target="_blank" href="{{ $item['profile_link'] }}"
                                            class="hover:underline">{{ ucfirst($item['social_network']) }}

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
    <hr class="my-6 border-secondary-500/20 mx-auto" />
    <div class="sm:flex flex-wrap sm:items-center sm:justify-between">
        <div class="order-4 sm:order-3">
            <div class="text-center text-sm md:text-left">
                © {{ date('Y') . ' - ' . data_get($setting, 'application.name', env('APP_NAME')) }}
            </div>
            <div class="mt-4 flex justify-center sm:hidden">
                <x-ui.social-network />
            </div>
        </div>
        <div class="mt-4 sm:mt-0 sm:justify-end order-3 sm:order-4 mx-auto sm:mx-0 hidden sm:flex">
            <x-ui.social-network />
        </div>
    </div>
    </div>
</section>
