@if($chatbox->visible)
<div>
    <a target="new" href="https://wa.me/{{ $chatbox->telephone }}/?text={{ $chatbox->message }}">
        <div class="chatbox z-50 fixed right-5 bottom-5 rounded-3xl text-primary-50 text-2xl flex items-center align-center p-4 text-center overflow-hidden hover:opacity-80 transition-all duration-100 cursor-pointer {{ $chatbox->animation_style }}"
            style="background-color: {{ $chatbox->color }}">
            <ion-icon name="{{ $chatbox->icon }}"></ion-icon>
        </div>
    </a>
</div>
@endif