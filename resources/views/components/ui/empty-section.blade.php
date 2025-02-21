@props(['message' => 'This section is empty.', 'auth' => null])

@isset($info['empty_section'])
    @if ($info['empty_section'])
        @auth
            <div class="text-center text-xs">
                <ion-icon class="mx-auto text-2xl" name="folder-open-outline"></ion-icon>
                <p class="my-4">{!! __($message . ' ' . $auth) !!} </p>
            </div>
        @endauth
    @endif
@endisset
