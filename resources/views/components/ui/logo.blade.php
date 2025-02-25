<a class="cursor-pointer transition-all duration-100 hover:opacity-70 active:opacity-20" href="{{ env('APP_URL') }}">
    @if (($design['logo'] ?? null) || ($design['logo_dark_mode'] ?? null))
        <x-curator-glider :media="$design['logo']"
            class="{{ $design['logo_size'] ? $design['logo_size'] : 'max-w-11' }} {{ $design['logo_dark_mode'] ? 'dark:hidden' : '' }} block object-contain" />
        <x-curator-glider :media="$design['logo_dark_mode']"
            class="{{ $design['logo_size'] ? $design['logo_size'] : 'max-w-11' }} hidden object-contain dark:block" />
    @else
        <svg class="h-10 w-auto fill-primary-600 dark:fill-white" style="fill: {{ $color ?? '' }}"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 159.38 106.35">
            <g id="Layer_2" data-name="Layer 2">
                <g id="Layer_1-2" data-name="Layer 1">
                    <polygon class="cls-1"
                        points="105.75 0 66.99 37.48 76.34 46.9 94.17 28.95 94.17 70.6 44 23.66 35 33.42 53.92 51.13 31.03 74.19 31.03 64.65 30.97 64.71 17.8 51.54 17.8 106.35 63.62 60.2 105.75 106.35 105.75 0" />
                    <polygon class="cls-1" points="0 27.74 0 106.35 13.22 106.35 13.22 43.35 0 27.74" />
                    <path class="cls-1"
                        d="M144.21,38H127a15.17,15.17,0,1,0,0,30.33h17.17a15.17,15.17,0,1,0,0-30.33Zm-2.33,23.93H129.62V58.52l7.08-7a3.52,3.52,0,0,0,1.07-2.58,2.47,2.47,0,0,0-.63-1.73,2.11,2.11,0,0,0-1.64-.69,2.2,2.2,0,0,0-1.7.71,2.61,2.61,0,0,0-.65,1.84h-3.83a6,6,0,0,1,.8-3.13,5.75,5.75,0,0,1,2.22-2.1,6.82,6.82,0,0,1,3.28-.77,6.89,6.89,0,0,1,3.17.7,5.3,5.3,0,0,1,2.12,2,5.53,5.53,0,0,1,.76,2.92,6.71,6.71,0,0,1-.64,2.87A9,9,0,0,1,139,54.26l-4.44,4.24h7.35Z" />
                </g>
            </g>
        </svg>
    @endif
</a>
