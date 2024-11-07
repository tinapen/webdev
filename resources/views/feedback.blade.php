<x-app-layout>
    @include('layouts.sidebar')
    
        <div class="py-8 lg:py-32 px-60 mx-auto max-w-full sm:ml-64 bg-white dark:bg-gray-900  min-h-[100px]">
            <x-flash-message />
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Make webdev better!</h2>
            <p class="mb-8 lg:mb-16 font-light text-sm text-center text-gray-900 dark:text-white sm:text-xl">Got a technical issue? Want to send feedback about our website? Have a suggestion for a new feature ? Let us know by filling out the form below or you can email us at <span class="text-blue-500"><a href="#" class='hover:underline focus:underline decoration-blue-500'>supportcenter@webdev.com</a></span>.</p>
            <form action="/feedback" method="POST" class="space-y-8">
                @csrf
                <div>
                    <label for="user_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                    <input type="email" id="user_email" name="user_email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-700 dark:focus:border-blue-700 dark:shadow-sm-light" placeholder="name@email.com" required>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-blue-700 focus:border-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-700 dark:focus:border-blue-700 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your message</label>
                    <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-blue-700 focus:border-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-700 dark:focus:border-blue-700" placeholder="Leave a message..." required></textarea>
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send message</button>
            </form>
        </div>
</x-app-layout>