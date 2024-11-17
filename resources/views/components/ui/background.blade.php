@isset($design['background_image_visibility'])

<div id="default-background" class="
w-full h-[1000px] absolute -z-50 -mt-36
{{ $design['background_image'] ? '' : 'animate-pulse' }}
{{ $design['animation'] ? 'animate-opacity opacity-10' : null }}
{{ $design['background_image_size'] . ' ' . 
        $design['background_image_position'] . ' ' . $design['background_image_repeat'] }}"
    style="background-image: url('{{ asset('storage/' . $design['background_image']) }}')">
</div>
<div id="bg-grip" class="gripper absolute w-full h-[1000px]">
    <img class="dark:hidden w-full mt-36" src="{{ asset('img/core/bg/bg-grip.png') }}" />
    <img class="dark:block w-full mt-36" src="{{ asset('img/core/bg/bg-grip-dark.png') }}" />
</div>

@endif