@props(['title' => null])

<div>
    <nav class="flex py-2" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ env('APP_URL') }}"
                    class="inline-flex items-center text-sm font-medium hover:text-primary-600">
                    {{ __('Home') }}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ env('APP_URL') . '/' . 'blog' }}"
                        class="ms-1 text-sm font-medium hover:text-primary-600 md:ms-2">{{ __('Posts') }}</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium md:ms-2">
                        {{ Str::words($title, 8, '...') }}
                    </span>
                </div>
            </li>
        </ol>
    </nav>
</div>
