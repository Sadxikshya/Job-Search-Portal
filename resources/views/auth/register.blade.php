<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <div class="mx-auto max-w-2xl">
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            <form id="registerForm" class="px-4 py-6 sm:p-8">
                @csrf
                
                <!-- Loading indicator -->
                <div id="loadingIndicator" class="hidden mb-4 p-4 bg-blue-50 rounded-md">
                    <div class="flex items-center">
                        <svg class="animate-spin h-5 w-5 text-blue-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="text-sm text-blue-700">Creating your account...</span>
                    </div>
                </div>

                <!-- Error container -->
                <div id="errorContainer" class="hidden mb-4 p-4 bg-red-50 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p id="errorMessage" class="text-sm text-red-700"></p>
                        </div>
                    </div>
                </div>
                
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
                                    <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="role_type"></p>
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
                                        <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="first_name"></p>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="last_name">Last Name</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="last_name" name="last_name" placeholder="Shah" required/>
                                        <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="last_name"></p>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field>
                                    <x-form-label for="email">Email Address</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="email" name="email" type="email" placeholder="example@gmail.com" required/>
                                        <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="email"></p>
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
                                        <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="password"></p>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="password_confirmation" name="password_confirmation" type="password" required/>
                                        <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="password_confirmation"></p>
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
                    <button type="submit" id="submitBtn" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Account
                    </button>
                </div>
            </form>
        </div>

        <!-- Additional Help Text -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
        </p>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            document.getElementById('errorContainer').classList.add('hidden');
            
            // Show loading
            const loadingIndicator = document.getElementById('loadingIndicator');
            const submitBtn = document.getElementById('submitBtn');
            loadingIndicator.classList.remove('hidden');
            submitBtn.disabled = true;
            
            // Get form data
            const formData = {
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
                role_type: document.getElementById('role_type').value,
            };
            
            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                        // Remove CSRF token for API routes
                    },
                    body: JSON.stringify(formData)
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Store token for future API calls
                    if (data.token) {
                        localStorage.setItem('auth_token', data.token);
                        localStorage.setItem('user', JSON.stringify(data.user));
                    }
                    
                    // Redirect based on role
                    if (data.user.role_type === 'employer') {
                        window.location.href = '/jobs';
                    } else if (data.user.role_type === 'jobseeker') {
                        window.location.href = '/jobs';
                    }
                } else {
                    // Handle validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.querySelector(`[data-field="${field}"]`);
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                                errorElement.classList.remove('hidden');
                            }
                        });
                    }
                    
                    // Show general error message
                    if (data.message) {
                        document.getElementById('errorMessage').textContent = data.message;
                        document.getElementById('errorContainer').classList.remove('hidden');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('errorMessage').textContent = 'An unexpected error occurred. Please try again.';
                document.getElementById('errorContainer').classList.remove('hidden');
            } finally {
                // Hide loading
                loadingIndicator.classList.add('hidden');
                submitBtn.disabled = false;
            }
        });
    </script>
</x-layout>