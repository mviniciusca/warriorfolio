@props([
    'course'            => '',
    'conclusion_date'   => '',
    'university'        => '',
])

<ol class="border-l border-neutral-300 dark:border-neutral-500">
  <li>
    <div class="flex-start flex items-center pt-3">
      <div
        class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500"></div>
      <p class="text-sm text-neutral-500 dark:text-neutral-300">
        {{ $conclusion_date }}
      </p>
    </div>
    <div class="mt-2 ml-4 mb-6">
      <h4 class="mb-1.5 text-xl font-semibold">{{ $course }}</h4>
      <p class="mb-3 text-neutral-500 dark:text-neutral-300">
        {{ $university}}
      </p>
    </div>
  </li>
</ol>
