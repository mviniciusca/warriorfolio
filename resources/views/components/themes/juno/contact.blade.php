@php
    $title = 'Get in Touch';
    $subtitle = "Have a project in mind? Let's work together";
@endphp

<div class="px-4">
    <x-themes.juno.partials.header :subtitle="$subtitle" :title="$title" />

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
            <form class="space-y-5">
                <div>
                    <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                        for="name">Name</label>
                    <input
                        class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                        id="name" placeholder="Your name" type="text">
                </div>
                <div>
                    <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                        for="email">Email</label>
                    <input
                        class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                        id="email" placeholder="your@email.com" type="email">
                </div>
                <div>
                    <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                        for="subject">Subject</label>
                    <input
                        class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                        id="subject" placeholder="What's this about?" type="text">
                </div>
                <div>
                    <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                        for="message">Message</label>
                    <textarea
                        class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                        id="message" placeholder="Your message" rows="4"></textarea>
                </div>
                <button
                    class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
                    type="submit">
                    Send message
                </button>
            </form>
        </div>
    </div>
</div>
