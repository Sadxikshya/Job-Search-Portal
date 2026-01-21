<x-layout>
    <x-slot:heading>
        Job Applicants
    </x-slot:heading>

    <div class="max-w-5xl mx-auto">
        <!-- Job Info Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-lg overflow-hidden mb-6">
            <div class="px-6 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ $job->title }}</h2>
                        <p class="text-indigo-100 mt-1">{{ $applications->count() }} {{ Str::plural('applicant', $applications->count()) }}</p>
                    </div>
                    <a href="/jobs/{{ $job->id }}" 
                       class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg text-sm font-medium text-white hover:bg-white/30 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Job
                    </a>
                </div>
            </div>
        </div>

        <!-- Applicants List -->
        @forelse ($applications as $application)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-4 hover:shadow-md transition">
                <div class="p-5">
                    <div class="flex items-start gap-4">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            @if($application->user->jobseekerProfile && $application->user->jobseekerProfile->profile_image)
                                <img
                                    src="{{ asset('profile-images/' . $application->user->jobseekerProfile->profile_image) }}"
                                    alt="Profile image"
                                    class="w-14 h-14 rounded-full object-cover shadow-md border border-white/40"
                                />
                            @else
                                <div class="w-14 h-14 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center shadow-md">
                                    <span class="text-xl font-bold text-white">
                                        {{ strtoupper(substr($application->user->first_name, 0, 1)) }}{{ strtoupper(substr($application->user->last_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Applicant Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $application->user->first_name }} {{ $application->user->last_name }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-0.5">{{ $application->user->email }}</p>
                                    
                                    @if($application->user->jobseekerProfile)
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            @if($application->user->jobseekerProfile->experience_level)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    {{ ucfirst($application->user->jobseekerProfile->experience_level) }} Level
                                                </span>
                                            @endif
                                            @if($application->user->jobseekerProfile->education)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    {{ $application->user->jobseekerProfile->education }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif

                                    <p class="text-xs text-gray-500 mt-2">
                                        Applied {{ $application->created_at->diffForHumans() }}
                                    </p>

                                    @php
                                    $colors = [
                                        'reviewing' => 'bg-yellow-100 text-yellow-800',
                                        'accepted' => 'bg-green-100 text-green-800',
                                        'rejected' => 'bg-red-100 text-red-800',
                                    ];
                                    $status = strtolower($application->status ?? '');
                                    $statusColor = $colors[$status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp

                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColor }}">
                                        {{ ucfirst($status) }}
                                    </span>


                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-2 ml-4">
                                    @if($application->user->jobseekerProfile)
                                        <a href="{{ route('jobseeker.show', $application->user) }}" 
                                           class="inline-flex items-center px-3 py-2 bg-indigo-50 text-indigo-700 rounded-lg text-sm font-medium hover:bg-indigo-100 transition">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            View Profile
                                        </a>
                                    @else
                                        <span class="inline-flex items-center px-3 py-2 bg-gray-100 text-gray-500 rounded-lg text-sm font-medium">
                                            No Profile
                                        </span>
                                    @endif

                                    <form method="POST" action="/applications/{{ $application->id }}/status">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                            onchange="this.form.submit()"
                                            class="rounded-lg border-gray-300 text-sm">

                                            <option value="reviewing" @selected($application->status === 'reviewing')>
                                                Reviewing
                                            </option>
                                            <option value="accepted" @selected($application->status === 'accepted')>
                                                Accepted
                                            </option>
                                            <option value="rejected" @selected($application->status === 'rejected')>
                                                Rejected
                                            </option>
                                        </select>
                                    </form>


                                    {{-- <a href="mailto:{{ $application->user->email }}" 
                                       class="inline-flex items-center justify-center w-9 h-9 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition"
                                       title="Send Email">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No applicants yet</h3>
                        <p class="text-sm text-gray-600 mb-6">
                            When jobseekers apply for this position, they'll appear here.
                        </p>
                        <a href="/jobs" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                            View all jobs →
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</x-layout>