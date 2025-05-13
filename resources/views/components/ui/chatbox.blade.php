@if ($is_active)
<div>
    <a href="{{ config('warriorfolio.whatsapp_web_url', env('WHATSAPP_WEB_URL')) . config('warriorfolio.mobile_country_code', env('MOBILE_COUNTRY_CODE')) . $mobile_number }}/?text={{ $message }}"
        target="_blank">

        <div class="chatbox align-center {{ $animation_style }} fixed bottom-5 right-5 z-20 flex cursor-pointer items-center overflow-hidden rounded-full p-3 text-center text-primary-50 transition-all duration-100 hover:opacity-80"
            style="background-color: {{ $color }}">
            <ion-icon class="text-3xl" name="{{ $icon ?? 'logo-whatsapp' }}"></ion-icon>
        </div>
    </a>
</div>
@endif
