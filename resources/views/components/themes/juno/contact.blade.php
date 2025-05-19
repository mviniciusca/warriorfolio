<div class="px-4">
    <x-themes.juno.partials.header :$title :$subtitle />

    <div class="grid gap-8 md:grid-cols-2">
        <!-- Contact Info Column -->
        <div class="space-y-6">
            <div>
                <h3 class="mb-4 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                    Company Information</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                            icon="location-outline" />
                        <div>
                            <p class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                Address</p>
                            <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                123 Developer Street<br>
                                Tech District<br>
                                San Francisco, CA 94107
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                            icon="call-outline" />
                        <div>
                            <p class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                Phone</p>
                            <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                +1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                            icon="mail-outline" />
                        <div>
                            <p class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                Email</p>
                            <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                contact@company.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                            icon="time-outline" />
                        <div>
                            <p class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                Business Hours</p>
                            <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 10:00 AM - 4:00 PM<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div>
            @livewire('mail.create-mail')
        </div>
    </div>
</div>
