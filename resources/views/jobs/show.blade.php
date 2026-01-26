<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="max-w-5xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
            
            <!-- Header with subtle gradient -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200 p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
                        <div class="flex items-center gap-4 text-sm text-gray-600">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                </svg>
                                {{ $job->user->first_name }} {{ $job->user->last_name }}
                            </span>
                            <span class="text-gray-300">•</span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ $job->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    
                    @auth
                        @if($canEdit)
                            <a href="/jobs/{{ $job->id }}/edit" class="px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                Edit Job
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Key Details Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 bg-gray-50">
                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Salary</p>
                    </div>
                    <p class="text-lg font-bold text-gray-900">Rs. {{ number_format($job->salary) }}</p>
                    <p class="text-xs text-gray-500">per year</p>
                </div>

                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Location</p>
                    </div>
                    <p class="text-lg font-bold text-gray-900">{{ $job->location }}</p>
                </div>

                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Job Type</p>
                    </div>
                    <p class="text-lg font-bold text-gray-900">{{ ucfirst($job->job_type) }}</p>
                </div>

                <div class="bg-white p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-orange-100 rounded-lg">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-xs font-medium text-gray-500 uppercase">Experience</p>
                    </div>
                    <p class="text-lg font-bold text-gray-900">{{ ucfirst($job->experience_level) }}</p>
                </div>
            </div>

            <!-- Description Section -->
            <div class="p-6 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    Job Description
                </h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed trix-content">
                    {!! $job->description !!}
                </div>
            </div>

            <!-- Requirements Section -->
            @if($job->education)
            <div class="p-6 border-t border-gray-200 bg-gray-50">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    Requirements
                </h2>
                <div class="grid md:grid-cols-2 gap-3">
                    <div class="flex items-start gap-3 bg-white p-4 rounded-lg border border-gray-200">
                        <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Education</p>
                            <p class="font-medium text-gray-900">{{ $job->education }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-white p-4 rounded-lg border border-gray-200">
                        <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Experience Level</p>
                            <p class="font-medium text-gray-900">{{ ucfirst($job->experience_level) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Employer Info -->
            <div class="p-6 border-t border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    About the Employer
                </h2>
                <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg border border-gray-200">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">
                        <span class="text-xl font-bold text-white">
                            {{ strtoupper(substr($job->user->first_name, 0, 1)) }}{{ strtoupper(substr($job->user->last_name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-lg">{{ $job->user->first_name }} {{ $job->user->last_name }}</p>
                        <p class="text-sm text-gray-600">{{ $job->user->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Application Section -->
            <div class="p-6 border-t border-gray-200 bg-gradient-to-br from-gray-50 to-blue-50">
                @auth
                    <!-- Employer Actions -->
                    @if(auth()->user()->role_type === 'employer' && auth()->id() === $job->user_id)
                        <a href="/jobs/{{ $job->id }}/applications" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow-md hover:shadow-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            View Applications
                        </a>
                    @endif

                    <!-- Jobseeker Actions -->
                    @if(auth()->user()->role_type === 'jobseeker')
                        @if($alreadyApplied)
                            <div class="flex items-center gap-3 px-6 py-3 bg-white border-2 border-green-200 rounded-lg">
                                <div class="p-2 bg-green-100 rounded-full">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-700">You have already applied for this job</span>
                            </div>
                        @elseif($showApplyButton)
                            <form method="POST" action="/jobs/{{ $job->id }}/apply">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-2 px-8 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 shadow-md hover:shadow-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Apply for this Job
                                </button>
                            </form>
                        @endif
                    @endif
                @endauth

                @guest
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-5 bg-white border-2 border-blue-200 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-100 rounded-full">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="font-medium text-gray-700">Please log in to apply for this job</p>
                        </div>
                        <a href="/login" class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow-md hover:shadow-lg transition-all">
                            Log In to Apply
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</x-layout>