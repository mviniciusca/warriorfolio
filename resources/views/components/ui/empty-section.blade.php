@props([
    'btn_icon'      => '',
    'btn_text'      => '',
    'link_path'     => '',
    'empty_icon'    => '',
    'empty_message' => '',
])
@auth
    <div class="grid w-auto justify-center text-center lowercase mb-4">
        <div class="flex justify-center">
            <div class="mb-2 mt-2 items-center text-6xl text-zinc-600">
                <ion-icon name="{{ $empty_icon }}"></ion-icon>
            </div>
        </div>
        <div class="text-sm text-zinc-400">{{ $empty_message }}</div>
        <div class="mt-3 flex justify-center">
            <a href="{{ url($link_path) }}">
                <button
                    class="flex w-auto items-center rounded-md border border-zinc-800 bg-zinc-800 py-2 px-2 text-center text-sm lowercase text-white transition-all duration-150 hover:bg-orange-500">
                    <ion-icon class="text-lg" name="{{ $btn_icon }}"></ion-icon>
                    <span class="ml-2 text-xs">{{ $btn_text }}</span>
                </button>
            </a>
        </div>
    </div>
@endauth
