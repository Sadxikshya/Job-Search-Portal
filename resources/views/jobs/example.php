<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <!-- Header Bar -->
    <div class="flex items-center justify-between mb-6">
        <!-- Filter Toggle Button -->
        <button 
            onclick="document.getElementById('filterPanel').classList.toggle('hidden')"
            class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            <span class="text-sm font-medium">Filters</span>
            @if(request()->hasAny(['search', 'location', 'job_type', 'salary_min', 'salary_max', 'experience_level']))
                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
            @endif
        </button>

        {{-- @auth
            @if (auth()->user()->isEmployer()) 
                <a href="/jobs/create" class="px-5 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 transition-colors">
                    Post a Job
                </a>
            @endif
        @endauth --}}
    </div>
    
    <!-- Filter Panel -->
    <div id="filterPanel" class="hidden mb-6">
        <form method="GET" action="/jobs" class="bg-white p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Job title..."
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                />
                <input
                    type="text"
                    name="location"
                    value="{{ request('location') }}"
                    placeholder="Location..."
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                />
                <select name="job_type" class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="">Job Type</option>
                    @foreach(['full-time','part-time','contract','internship'] as $type)
                        <option value="{{ $type }}" @selected(request('job_type') === $type)>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
                <input
                    type="number"
                    name="salary_min"
                    value="{{ request('salary_min') }}"
                    placeholder="Min Salary"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                />
                <input
                    type="number"
                    name="salary_max"
                    value="{{ request('salary_max') }}"
                    placeholder="Max Salary"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                />
                <select name="experience_level" class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="">Experience</option>
                    @foreach(['junior','mid','senior'] as $level)
                        <option value="{{ $level }}" @selected(request('experience_level') === $level)>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <a href="/jobs" class="px-3 py-1.5 text-sm text-gray-600 hover:text-gray-900">
                    Reset
                </a>
                <button class="px-4 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Job Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($jobs as $job)
            <div class="bg-white border border-gray-200 rounded-lg p-5 hover:border-gray-300 hover:shadow-sm transition-all">
                <div class="flex flex-col h-full">
                    <div class="flex-1">
                        <div class="flex items-start justify-between gap-3 mb-3">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-1">
                                {{ $job->title }}
                            </h3>
                            <span class="flex-shrink-0 px-2.5 py-0.5 text-xs font-medium rounded
                                @if($job->job_type === 'full-time') 
                                @elseif($job->job_type === 'part-time') 
                                @elseif($job->job_type === 'contract') 
                                @elseif($job->job_type === 'internship') 
                                @else bg-gray-50 text-gray-700 border border-gray-200
                                @endif">
                                {{ ucfirst($job->job_type) }}
                            </span>
                        </div>
                        
                        <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                            <span class="font-medium truncate">{{ $job->user->first_name }} {{ $job->user->last_name }}</span>
                            <span class="text-gray-300">•</span>
                            <span class="flex items-center gap-1 truncate">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $job->location }}
                            </span>
                        </div>

                        <div class="text-lg font-semibold text-gray-900 mb-4">
                            Rs. {{ number_format($job->salary) }}<span class="text-sm font-normal text-gray-500">/year</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-2 pt-3 border-t border-gray-100">
                        <a href="/jobs/{{ $job->id }}" class="px-3 py-1.5 bg-blue-400 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors text-center">
                            View Job
                        </a>
                        
                        @auth
                            @if(auth()->id() === $job->user_id)
                                <a href="/jobs/{{ $job->id }}/edit" class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Delete this job?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($jobs->isEmpty())
        <div class="text-center py-12 bg-white border border-gray-200 rounded-lg">
            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-base font-medium text-gray-700 mb-1">No jobs found</h3>
            <p class="text-sm text-gray-500">Try adjusting your filters</p>
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>