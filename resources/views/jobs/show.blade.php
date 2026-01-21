<x-layout>
    <x-slot:heading>
        Job Details
</x-slot:heading>
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
        <h1 class="text-3xl font-bold mb-2">{{ $job->title }}</h1>
        <div class="flex items-center gap-4 text-blue-100">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                </svg>
                Posted by {{ $job->user->first_name ?? 'Employer' }}
            </span>
            
            <span>•</span>
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                {{ $job->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

    <!-- Job Details Grid -->
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            
            <!-- Salary -->
            <div class="flex items-start gap-3 p-4 bg-green-50 rounded-lg border border-green-100">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Salary</p>
                    <p class="text-lg font-bold text-gray-900">Rs.{{ number_format($job->salary) }}</p>
                </div>
            </div>

            <!-- Location -->
            <div class="flex items-start gap-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Location</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $job->location }}</p>
                </div>
            </div>

            <!-- Job Type -->
            <div class="flex items-start gap-3 p-4 bg-purple-50 rounded-lg border border-purple-100">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Job Type</p>
                    <p class="text-lg font-semibold text-gray-900">{{ ucfirst($job->job_type) }}</p>
                </div>
            </div>

            <!-- Education -->
            <div class="flex items-start gap-3 p-4 bg-orange-50 rounded-lg border border-orange-100">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Education</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $job->education }}</p>
                </div>
            </div>

            <!-- Experience Level -->
            <div class="flex items-start gap-3 p-4 bg-indigo-50 rounded-lg border border-indigo-100">
                <div class="p-2 bg-indigo-100 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Experience</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $job->experience_level }}</p>
                </div>
            </div>

        </div>

        <!-- Description Section -->
        <div class="border-t pt-6">
            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Job Description
            </h3>
            <div class="text-gray-700 leading-relaxed trix-content">
                {!! $job->description !!}
            </div>
        </div>



        <!-- Add this after the Description Section in your job details page -->
        <div class="border-t pt-6 mt-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                About the Employer
            </h3>
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-lg font-bold text-indigo-600">
                            {{ strtoupper(substr($job->user->first_name, 0, 1)) }}{{ strtoupper(substr($job->user->last_name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">{{ $job->user->first_name }} {{ $job->user->last_name }}</p>
                        <p class="text-sm text-gray-600">{{ $job->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons Section -->
    <div class="mt-6 pt-6 border-t">
        @auth
                {{-- EMPLOYER: Edit Button --}}
                @if($canEdit)
                    <a href="/jobs/{{ $job->id }}/edit" class="inline-block px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                        Edit Job
                    </a>
                @endif


                {{-- EMPLOYER: View Applicants --}}
                @if(auth()->user()->role_type === 'employer' && auth()->id() === $job->user_id)
                    <a href="/jobs/{{ $job->id }}/applications"
                    class="inline-block ml-4 px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
                        View Applicants
                    </a>
                @endif


                {{-- JOBSEEKER: Apply Button or Applied Status --}}
                @if(auth()->user()->role_type === 'jobseeker')
                    @if($alreadyApplied)
                        <div class="flex items-center gap-2 px-6 py-3 bg-gray-100 border-2 border-gray-300 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-semibold text-gray-700">Already Applied</span>
                        </div>
                    @elseif($showApplyButton)
                        <form method="POST" action="/jobs/{{ $job->id }}/apply">
                            @csrf
                            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Apply for this Job
                            </button>
                        </form>
                    @endif
                @endif
        @endauth

        {{-- GUEST: Login Prompt --}}
        @guest
            <div class="flex flex-col sm:flex-row items-center gap-4 p-4 bg-blue-50 border-2 border-blue-200 rounded-lg">
                <div class="flex items-center gap-2 text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">You must be logged in to apply</span>
                </div>
                <a href="/login" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-200">
                    Login to Apply
                </a>
            </div>
        @endguest
</div>


</div>

</x-layout>
