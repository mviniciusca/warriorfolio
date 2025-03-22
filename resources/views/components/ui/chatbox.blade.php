@if ($chatbox->visible ?? false)
    <div>
        <a target="_blank"
            href="{{ config('warriorfolio.whatsapp_web_url', env('WHATSAPP_WEB_URL')) . config('warriorfolio.mobile_country_code', env('MOBILE_COUNTRY_CODE')) . $chatbox->telephone }}/?text={{ $chatbox->message }}">

            <div class="chatbox align-center {{ $chatbox->animation_style }} fixed bottom-5 right-5 z-50 flex cursor-pointer items-center overflow-hidden rounded-full p-3 text-center text-primary-50 transition-all duration-100 hover:opacity-80"
                style="background-color: {{ $chatbox->color ?? '#25D366' }}">
                <ion-icon class="text-3xl" name="{{ $chatbox->icon ?? 'logo-whatsapp' }}"></ion-icon>
            </div>

        </a>
    </div>
@endif
