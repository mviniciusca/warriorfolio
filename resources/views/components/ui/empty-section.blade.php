@props(['message' => 'This section is empty.', 'auth' => null])

@auth
<div class="grid w-full content-center justify-center text-center">
    <ion-icon class="mx-auto text-3xl" name="folder-open-outline"></ion-icon>
    <p class="my-4 text-sm">{{ __($message . ' ' . $auth) }} </p>
</div>
@endauth
