<x-layout>
    <x-slot:heading>
        Jobseeker Profile
    </x-slot:heading>

    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-8">
                <div class="flex items-start gap-6">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        @if($user->jobseekerProfile && $user->jobseekerProfile->profile_image)
                            <img
                                src="{{ asset('profile-images/' . $user->jobseekerProfile->profile_image) }}"
                                alt="Profile image"
                                class="w-20 h-20 rounded-full object-cover shadow-md border border-white/40"
                            />
                        @else
                            <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow-md">
                                <span class="text-3xl font-bold text-indigo-600">
                                    {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- User Info -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-white">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </h1>
                        <p class="text-indigo-100 mt-2 text-lg">{{ $profile->education }}</p>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white backdrop-blur-sm">
                                💼 {{ ucfirst($profile->experience_level) }} Level
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white backdrop-blur-sm">
                                📍 {{ $profile->address }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-base font-semibold text-gray-900">Contact Information</h2>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Email</p>
                            <p class="text-sm font-medium text-gray-900">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Phone</p>
                            <p class="text-sm font-medium text-gray-900">{{ $profile->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        @if($user->jobseekerProfile->bio)
            <div class="prose max-w-none">
                {!! $user->jobseekerProfile->bio !!}
            </div>
        @endif


        <!-- Skills Section -->
        @if($profile->skills)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-base font-semibold text-gray-900">Skills & Expertise</h2>
            </div>
            <div class="p-4">
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $profile->skills) as $skill)
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-indigo-50 text-indigo-700 border border-indigo-100">
                            {{ trim($skill) }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Resume Section -->
        @if($profile->resume)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-base font-semibold text-gray-900">Resume</h2>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-red-50 to-orange-50 rounded-lg border border-red-100">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 rounded-lg bg-white shadow-sm flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900">{{ basename($profile->resume) }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">PDF Document • Resume</p>
                    </div>
                    <a href="{{ Storage::url($profile->resume) }}" target="_blank" download
                       class="inline-flex items-center px-4 py-2 bg-white text-sm font-semibold text-red-600 rounded-lg hover:bg-red-50 border border-red-200 shadow-sm transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Back Button -->
        <div class="flex justify-center pt-4">
            <a href="/jobs" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Jobs
            </a>
        </div>

    </div>
</x-layout>