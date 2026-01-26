<x-layout>
    <x-slot:heading>
        My Profile
    </x-slot:heading>

    <div class="max-w-6xl mx-auto space-y-6">
        
        <!-- Profile Header Card -->
        <div class="relative text-white overflow-hidden"  style="background-color: rgba(59,130,246,.5);">
            <div class="px-6 py-8 sm:px-8">
                <div class="flex items-center space-x-4">
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
                        <h2 class="text-2xl font-bold text-white">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </h2>
                        <p class="text-indigo-100 mt-1">{{ $user->email }}</p>
                        <div class="mt-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white backdrop-blur-sm">
                                {{ $user->isEmployer() ? '👔 Employer' : '💼 Job Seeker' }}
                            </span>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    @if($user->isEmployer())
                    <div class="hidden sm:block text-right">
                        <div class="text-3xl font-bold text-white">{{ $jobs->count() }}</div>
                        <div class="text-sm text-indigo-100">Jobs Posted</div>
                    </div>
                    @endif

                    @if(!$user->isEmployer())
                        <a href="{{ route('jobseeker.profile.edit') }}"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-lg text-sm font-medium text-white hover:bg-indigo-700 shadow-sm transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ Auth::user()->hasCompletedProfile() ? 'Edit My Profile' : 'Complete My Profile' }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('profile.edit') }}" 
               class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Profile
            </a>
            @if(!$user->isEmployer() && $user->jobseekerProfile)
                <a href="{{ route('jobseeker.cv.download', $user) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-sm font-semibold text-white rounded-lg hover:bg-indigo-700 shadow-sm transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download CV
                </a>
            @endif

            {{-- <a href="{{ route('password.edit') }}" 
               class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                Change Password
            </a> --}}

            @if($user->isEmployer())
            <a href="/jobs/create" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-lg text-sm font-medium text-white hover:bg-indigo-700 shadow-sm transition">    
                Post a Job
            </a>
            @endif
        </div>

        <!-- JOBSEEKER PROFILE DETAILS -->
        @if(!$user->isEmployer() && $user->jobseekerProfile)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-900">Professional Profile</h3>
                <p class="text-xs text-gray-600 mt-0.5">Your details</p>
            </div>

            <div class="p-4 space-y-4">
                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase">Phone</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->jobseekerProfile->phone }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase">Address</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->jobseekerProfile->address }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>

                <!-- Professional Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase">Education</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $user->jobseekerProfile->education }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase">Experience Level</label>
                        <p class="mt-1">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($user->jobseekerProfile->experience_level) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Skills -->
                @if($user->jobseekerProfile->skills)
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Skills</label>
                    <div class="mt-1.5 flex flex-wrap gap-1.5 ">
                        @foreach(explode(',', $user->jobseekerProfile->skills) as $skill)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                {{ trim($skill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Bio -->
                @if($user->jobseekerProfile->bio)
                    <div>
                        <label class="text-xs font-semibold text-gray-500 uppercase">
                            About Me
                        </label>

                        <div class="mt-1.5 text-sm text-gray-700 leading-relaxed trix-content">
                            {!! $user->jobseekerProfile->bio !!}
                        </div>
                    </div>
                @endif


                <!-- Resume -->
                @if($user->jobseekerProfile->resume)
                <div class="border-t border-gray-200 pt-4">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Resume</label>
                    <div class="mt-1.5 flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ basename($user->jobseekerProfile->resume) }}</p>
                            <p class="text-xs text-gray-500">PDF Document</p>
                        </div>
                        <a href="{{ Storage::url($user->jobseekerProfile->resume) }}" target="_blank" 
                           class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @elseif(!$user->isEmployer() && !$user->jobseekerProfile)
        <!-- Empty State for Jobseekers without Profile -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 py-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center mb-3">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1.5">Complete Your Profile</h3>
                    <p class="text-sm text-gray-600 mb-4 max-w-md">
                        Add your professional details, skills, and resume to stand out to employers.
                    </p>
                    <a href="{{ route('jobseeker.profile.edit') }}" 
                       class="inline-flex items-center px-3.5 py-2 bg-indigo-600 rounded-lg text-sm font-medium text-white hover:bg-indigo-700 shadow-sm transition">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Complete Profile Now
                    </a>
                </div>
            </div>
        </div>
        @endif



        <!-- MY JOBS (for Employer) -->
        @if($user->isEmployer())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900">My Job Listings</h3>
                <p class="text-sm text-gray-600 mt-1">Manage your posted positions</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Job Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Salary</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Applicants</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($jobs as $job)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $job->title }}</div>
                                <div class="text-sm text-gray-500">{{ ucfirst($job->job_type) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-green-600">Rs.{{ number_format($job->salary) }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $job->location }}
                            </td>

                             <td class="px-6 py-4 text-center">
                                <a href="/jobs/{{ $job->id }}/applications" 
                                   class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium hover:bg-blue-100 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $job->applications_count }}</span>
                                </a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="/jobs/{{ $job->id }}" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition"
                                       title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="/jobs/{{ $job->id }}/edit" 
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition"
                                       title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form method="POST" action="/jobs/{{ $job->id }}" 
                                          onsubmit="return confirm('Are you sure you want to delete this job?')"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition"
                                                title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-sm mb-4">You haven't posted any jobs yet</p>
                                    <a href="/jobs/create" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                        Create your first job →
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- MY APPLICATIONS (for Job Seeker) -->
        @if(!$user->isEmployer())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900">My Applications</h3>
                <p class="text-sm text-gray-600 mt-1">Jobs you've applied to</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Job Title</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Posted by</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Salary</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($appliedJobs as $job)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $job->title }}</div>
                                <div class="text-sm text-gray-500">{{ $job->location }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $job->user->first_name }} {{ $job->user->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-green-600">Rs.{{ number_format($job->salary) }}</span>
                            </td>
                            
                            <td class="px-6 py-4">
                                @php
                                    $status = $job->pivot->status;
                                @endphp

                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    @if($status === 'accepted') bg-green-100 text-green-800
                                    @elseif($status === 'rejected') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800
                                    @endif">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="/jobs/{{ $job->id }}" 
                                   class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-lg transition">
                                    View Details
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-gray-500 text-sm mb-4">You haven't applied to any jobs yet</p>
                                    <a href="/jobs" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                        Browse available jobs →
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</x-layout>