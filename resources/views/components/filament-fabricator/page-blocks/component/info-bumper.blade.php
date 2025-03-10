{{--  Info Bumper Component Loader --}}

@aware(['page'])
@props([
    'bumper_target' => null ?? '_self',
    'bumper_link' => null,
    'bumper_role' => null,
    'bumper_tag' => null,
    'bumper_title' => null,
    'bumper_icon' => null,
    'is_active' => null,
    'is_center' => null,
    'is_animated' => null,
])

<x-ui.info-bumper :$is_active :$is_animated :$is_center :$bumper_icon :$bumper_link :$bumper_role :$bumper_tag
    :$bumper_target :$bumper_title />
