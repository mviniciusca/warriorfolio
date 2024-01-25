@props(['project'])
<!-- Main modal -->
<div id="{{ $project->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%)] max-h-full bg-black bg-opacity-10">
    <div class="relative p-12 w-full max-w-5xl max-h-full mb-12">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow-md bg-secondary-50 dark:bg-secondary-900">
            <!-- Modal body -->
            <div class="p-12 space-y-4 mb-4">
                <div class="flex items-end">
                    <button type="button"
                        class="text-secondary-400 bg-transparent hover:bg-secondary-200 hover:text-secondary-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-secondary-600 dark:hover:text-secondary-50"
                        data-modal-hide="{{ $project->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="text-center">
                    <span class="px-3 py-1 text-sm rounded-md bg-primary-500 text-secondary-50">
                        {!! $project->category->name!!}
                    </span>
                </div>
                <div class="my-4 text-3xl tracking-tight font-semibold text-center">
                    {!! $project->name !!}
                </div>
                <div class="my-4 text-center text-md max-w-2xl mx-auto">
                    {!! $project->short_description!!}
                </div>
                <div class="my-4 project-content leading-loose" id="content">
                    {!! $project->content !!}
                </div>

            </div>

        </div>
    </div>
</div>
