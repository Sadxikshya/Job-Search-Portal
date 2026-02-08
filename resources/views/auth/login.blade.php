<x-layout>
    <x-slot:heading>
        Welcome Back
    </x-slot:heading>

    <div class="mx-auto max-w-md">
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            <form id="loginForm" class="px-4 py-6 sm:p-8">
                @csrf
                
                <div class="space-y-6">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">
                            Sign in to your account
                        </h2>
                        <p class="mt-2 text-sm leading-6 text-gray-600">
                            Enter your credentials to continue
                        </p>
                    </div>

                    <!-- Loading indicator -->
                    <div id="loadingIndicator" class="hidden p-4 bg-blue-50 rounded-md">
                        <div class="flex items-center">
                            <svg class="animate-spin h-5 w-5 text-blue-500 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="text-sm text-blue-700">Signing you in...</span>
                        </div>
                    </div>

                    <!-- Error container -->
                    <div id="errorContainer" class="hidden p-4 bg-red-50 rounded-md">
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

                    <div class="space-y-5">
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>
                            <div class="mt-2">
                                <x-form-input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    placeholder="example@gmail.com" 
                                    required 
                                    autofocus
                                />
                                <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="email"></p>
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <div class="flex items-center justify-between">
                                <x-form-label for="password">Password</x-form-label>
                            </div>
                            <div class="mt-2">
                                <x-form-input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    required
                                />
                                <p class="error-message text-sm text-red-600 mt-1 hidden" data-field="password"></p>
                            </div>
                        </x-form-field>
                    </div>

                    <div>
                        <button type="submit" id="submitBtn" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign In
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Additional Links -->
        <div class="mt-6 space-y-4">
            <p class="text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">
                    Create one now
                </a>
            </p>
            
            <p class="text-center">
                <a href="/" class="text-sm font-semibold text-gray-900 hover:text-gray-700">
                    ← Back to home
                </a>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            console.log('Login form submitted'); // Debug
            
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
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
            };
            
            console.log('Sending login request...'); // Debug
            
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'include', // Important: include cookies for session
                    body: JSON.stringify(formData)
                });
                
                console.log('Response status:', response.status); // Debug
                
                const data = await response.json();
                console.log('Response data:', data); // Debug
                
                if (data.success) {
                    // Store token in localStorage
                    if (data.token) {
                        localStorage.setItem('auth_token', data.token);
                        console.log('Token stored:', data.token.substring(0, 20) + '...'); // Debug
                    }
                    
                    // Store user info
                    if (data.user) {
                        localStorage.setItem('user', JSON.stringify(data.user));
                        console.log('User stored:', data.user.email); // Debug
                    }
                    
                    console.log('Redirecting to /jobs...'); // Debug
                    
                    // Redirect - use window.location.replace for full page reload
                    window.location.replace('/jobs');
                    
                } else {
                    console.error('Login failed:', data); // Debug
                    
                    // Handle errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.querySelector(`[data-field="${field}"]`);
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                                errorElement.classList.remove('hidden');
                            }
                        });
                    }
                    
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