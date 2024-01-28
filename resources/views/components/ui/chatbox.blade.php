@if($chatbox->visible)
<div>
    <a target="new" href="https://wa.me/{{ $chatbox->telephone }}/?text={{ $chatbox->message }}">
        <div class="chatbox z-50 fixed right-5 bottom-5 rounded-full text-primary-50 flex items-center align-center p-3 text-center overflow-hidden hover:opacity-80 transition-all duration-100 cursor-pointer
        {{ $chatbox->animation_style }}" style="background-color: {{ $chatbox->color }}">
            <ion-icon class="text-4xl" name="{{ $chatbox->icon }}"></ion-icon>
        </div>
    </a>
</div>
@endif
