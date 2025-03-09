@if ($chatbox->visible)
    <div>
        <a target="new"
            href="{{ env('WHATSAPP_WEB_URL') . env('MOBILE_COUNTRY_CODE') . $chatbox->telephone }}/?text={{ $chatbox->message }}">
            <div class="chatbox align-center {{ $chatbox->animation_style }} fixed bottom-5 right-5 z-50 flex cursor-pointer items-center overflow-hidden rounded-full p-3 text-center text-primary-50 transition-all duration-100 hover:opacity-80"
                style="background-color: {{ $chatbox->color }}">
                <ion-icon class="text-4xl" name="{{ $chatbox->icon }}"></ion-icon>
            </div>
        </a>
    </div>
@endif
