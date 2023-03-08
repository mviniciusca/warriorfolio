@props([
    'course' => '',
    'conclusion_date' => '',
    'university' => '',
])

<ol class="border-l border-zinc-700">
    <li>
        <div class="flex-start flex items-center pt-3">
            <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-zinc-500"></div>
            <p class="text-sm font-semibold text-zinc-500">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $conclusion_date)->format('F, Y') }}
            </p>
        </div>
        <div class="mt-2 ml-4 mb-6">
            <h4 class="mb-1.5 text-xl font-semibold text-zinc-400">{{ $course }}</h4>
            <p class="mb-3 text-zinc-400">
                {{ $university }}
            </p>
        </div>
    </li>
</ol>
