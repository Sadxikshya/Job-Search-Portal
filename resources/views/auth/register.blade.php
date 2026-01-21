<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <div class="mx-auto max-w-2xl">
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            <form method="POST" action="/register" class="px-4 py-6 sm:p-8">
                @csrf
                
                <div class="space-y-8">
                    <!-- Account Type Section -->
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Account Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Choose your account type and provide your details.</p>
                        
                        <div class="mt-6">
                            <x-form-field>
                                <x-form-label for="role_type">I am registering as a</x-form-label>
                                <div class="mt-2">
                                    <select id="role_type" name="role_type" required 
                                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="jobseeker" selected>Job Seeker</option>
                                        <option value="employer">Employer</option>
                                    </select>
                                    <x-form-error name="role_type"/>
                                </div>
                            </x-form-field>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">We'll use this information to create your profile.</p>

                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="first_name">First Name</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="first_name" name="first_name" placeholder="Ram" required/>
                                        <x-form-error name="first_name"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="last_name">Last Name</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="last_name" name="last_name" placeholder="Shah" required/>
                                        <x-form-error name="last_name"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="email" name="email" type="email" placeholder="example@gmail.com" required/>
                                        <x-form-error name="email"/>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Security</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Choose a strong password to protect your account.</p>

                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="password">Password</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="password" name="password" type="password" required/>
                                        <x-form-error name="password"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="password_confirmation" name="password_confirmation" type="password" required/>
                                        <x-form-error name="password_confirmation"/>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex items-center justify-between gap-x-6 border-t border-gray-900/10 pt-6">
                    <a href="/" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">
                        Cancel
                    </a>
                    <x-form-button>Create Account</x-form-button>
                </div>
            </form>
        </div>

        <!-- Additional Help Text -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
        </p>
    </div>
</x-layout>