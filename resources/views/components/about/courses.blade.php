{{-- Courses Timeline Feed --}}

<div id="profile-course-header" class="text-sm font-semibold mb-8 flex items-center gap-2 profile-course-header">
    <x-ui.ionicon :icon="'school-sharp'" />
    {{ __('Certifications') }}
</div>

<ol class="relative border-s border-secondary-100 dark:border-secondary-800 p-4">
    @foreach ($courses as $course)
    <li class="mb-10 ms-4">
        <div
            class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-secondary-50 bg-secondary-200 dark:border-secondary-950 dark:bg-secondary-700">
        </div>
        <h3 class="text-sm font-semibold mb-1">
            {{ $course->institution }}
        </h3>
        <p class="mb-1">
            {{ $course->name }}
        </p>
        <p class="text-sm mb-2 font-normal leading-none opacity-55 ">
            {{ \Carbon\Carbon::parse($course->start_date)->format('M, Y') }} -
            {{ \Carbon\Carbon::parse($course->end_date)->format('M, Y') }}
        </p>
        <p class="text-xs items-center flex gap-2 opacity-80 mt-1">
            @php
            $icon = match($course->status) {
            'completed' => 'checkmark-sharp',
            'planned' => 'calendar-sharp',
            'dropped' => 'close-sharp',
            default => 'book-sharp'
            };
            @endphp
            <x-ui.ionicon :icon="$icon" />
            {{ ucfirst(str_replace('-', ' ', $course->status)) }}

        </p>
    </li>
    @endforeach
</ol>



{{-- Empty Section --}}
@if($courses->count() === 0)
<x-ui.empty-section :auth="'Update your Courses'" />
@endif
