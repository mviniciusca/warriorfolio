@props(['message' => 'No content. ', 'auth' => null, 'icon' => 'folder-open-outline'])

@isset($info['empty_section'])
    @if ($info['empty_section'])
        @auth
            <div class="text-center text-xs">
                <ion-icon class="mx-auto text-2xl" name="{{ $icon }}"></ion-icon>
                <p class="my-1">{!! __($message . ' ' . $auth) !!} </p>
            </div>
        @endauth
    @endif
@endisset
