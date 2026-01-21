<x-layout>
    <x-slot:heading>
        Contact Us
    </x-slot:heading>

   <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-3">
                    Get in Touch
                </h1>
                <p class="text-gray-500 text-lg">
                    We would love to hear from you. Reach us anytime.
                </p>
            </div>

            <!-- Contact Info Grid -->
            <div class="grid gap-6 md:grid-cols-3">

                <!-- Email -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-gray-50 hover:bg-red-100 transition">
                    <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 7.5l-9.75 6-9.75-6" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5v10.5H3.75z" />
                    </svg>
                    <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                    <a href="mailto:contact@jobsearch.com" class="text-blue-600 hover:underline">
                        contact@jobsearch.com
                    </a>
                </div>

                <!-- Phone -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-gray-50 hover:bg-red-100 transition">
                    <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-3.375a1.5 1.5 0 00-1.5-1.5h-3.375a1.5 1.5 0 00-1.5 1.5v.375c-3.728-.82-6.68-3.772-7.5-7.5h.375a1.5 1.5 0 001.5-1.5V4.875a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v1.875z" />
                    </svg>
                    <h3 class="font-semibold text-gray-800 mb-1">Phone</h3>
                    <a href="tel:+1234567890" class="text-blue-600 hover:underline">
                        +977 1234567890
                    </a>
                </div>

                <!-- Address -->
                <div class="flex flex-col items-center text-center p-6 rounded-xl bg-gray-50 hover:bg-red-100 transition">
                    <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6-5.686 6-10.5a6 6 0 10-12 0C6 15.314 12 21 12 21z" />
                        <circle cx="12" cy="10.5" r="2.25" />
                    </svg>
                    <h3 class="font-semibold text-gray-800 mb-1">Address</h3>
                    <p class="text-gray-600">
                        Labim Mall, Nepal
                    </p>
                </div>

            </div>

            <div class="mt-12 rounded-xl overflow-hidden shadow-md border border-gray-200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29415.331839647402!2d85.32367823414508!3d27.678619473260934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19eb1dad6439%3A0xbb1689fdcee3740b!2sLabim%20Mall!5e0!3m2!1sen!2snp!4v1768986980359!5m2!1sen!2snp"
                    class="w-full h-[450px]"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <a 
            href="https://www.google.com/maps/search/?api=1&query=Labim Mall,Nepal"
            target="_blank"
            class="text-blue-600 hover:underline"
            >
                Labim Mall, Nepal
            </a>
    </div>
</x-layout>
