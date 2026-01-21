<x-layout>
    <x-slot:heading>
        Edit Profile
    </x-slot:heading>

    <div class="mx-auto max-w-2xl">
        @if (session('success'))
            <div class="mb-6 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            <form method="POST" action="/profile" class="px-4 py-6 sm:p-8">
                @csrf
                @method('PATCH')
                
                <div class="space-y-8">
                    <!-- Account Type Section -->
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Account Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Update your account type and details.</p>
                        
                        <div class="mt-6">
                            <x-form-field>
                                <x-form-label for="role_type">I am registered as a</x-form-label>
                                <div class="mt-2">
                                    <select id="role_type" name="role_type" required 
                                            class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="jobseeker" {{ $user->role_type === 'jobseeker' ? 'selected' : '' }}>Job Seeker</option>
                                        <option value="employer" {{ $user->role_type === 'employer' ? 'selected' : '' }}>Employer</option>
                                    </select>
                                    <x-form-error name="role_type"/>
                                </div>
                            </x-form-field>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Update your profile information.</p>

                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="first_name">First Name</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="Ram" required/>
                                        <x-form-error name="first_name"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="last_name">Last Name</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Khatri" required/>
                                        <x-form-error name="last_name"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="email" name="email" type="email" value="{{ $user->email }}" placeholder="ram@gmail.com" required/>
                                        <x-form-error name="email"/>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Security</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Manage your account security settings.</p>

                        <div class="mt-6">
                            <a href="{{ route('password.edit') }}" 
                               class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                Change Password
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex items-center justify-between gap-x-6 border-t border-gray-900/10 pt-6">
                    <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">
                        Cancel
                    </a>
                    <x-form-button>Update Profile</x-form-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>