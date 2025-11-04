@if($is_active)
<div>
    <button id="scrollUp"
        class="fixed h-10 w-10 items-center justify-center border bottom-24 right-7 z-40 hidden bg-secondary-50 border-secondary-300 text-secondary-500 dark:bg-secondary-800 dark:text-white dark:border-secondary-700 rounded-md transition duration-300 hover:opacity-30 active:opacity-85">
        <x-ui.ionicon icon="chevron-up-outline" class="w-6 h-6" />
    </button>
</div>
@endif
