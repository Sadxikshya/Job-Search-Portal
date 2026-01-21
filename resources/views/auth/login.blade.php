<x-layout>
    <x-slot:heading>
        Welcome Back
    </x-slot:heading>

    <div class="mx-auto max-w-md">
        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            <form method="POST" action="/login" class="px-4 py-6 sm:p-8">
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

                    <div class="space-y-5">
                        <x-form-field>
                            <x-form-label for="email">Email Address</x-form-label>
                            <div class="mt-2">
                                <x-form-input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    :value="old('email')" 
                                    placeholder="example@gmail.com" 
                                    required 
                                    autofocus
                                />
                                <x-form-error name="email"/>
                            </div>
                        </x-form-field>

                        <x-form-field>
                            <div class="flex items-center justify-between">
                                <x-form-label for="password">Password</x-form-label>
                                {{-- <a href="/forgot-password" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                                    Forgot password?
                                </a> --}}
                            </div>
                            <div class="mt-2">
                                <x-form-input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    required
                                />
                                <x-form-error name="password"/>
                            </div>
                        </x-form-field>
                    </div>

                    <div>
                        <x-form-button class="w-full justify-center">
                            Sign In
                        </x-form-button>
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
</x-layout>