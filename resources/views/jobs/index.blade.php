<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <!-- Header Bar -->
    <div class="flex items-center justify-between mb-6">
        <!-- Filter Toggle Button -->
        <button 
            onclick="document.getElementById('filterPanel').classList.toggle('hidden')"
            class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            <span class="text-sm font-medium">Filters</span>
            @if(request()->hasAny(['search', 'location', 'job_type', 'salary_min', 'salary_max', 'experience_level']))
                <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
            @endif
        </button>

        @auth
            @if (auth()->user()->isEmployer()) 
                <a href="/jobs/create"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white font-semibold text-sm
                          rounded-xl shadow-lg hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2
                          focus:ring-indigo-500 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Post a Job
                </a>
            @endif
        @endauth
    </div>
    
    <!-- Collapsible Filter Panel -->
    <div id="filterPanel" class="hidden mb-6">
        <form method="GET" action="/jobs" class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Job title..."
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all"
                />
                <input
                    type="text"
                    name="location"
                    value="{{ request('location') }}"
                    placeholder="Location..."
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all"
                />
                <select name="job_type" class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all">
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
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all"
                />
                <input
                    type="number"
                    name="salary_max"
                    value="{{ request('salary_max') }}"
                    placeholder="Max Salary"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all"
                />
                <select name="experience_level" class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-200 transition-all">
                    <option value="">Experience</option>
                    @foreach(['junior','mid','senior'] as $level)
                        <option value="{{ $level }}" @selected(request('experience_level') === $level)>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <a href="/jobs" class="px-3 py-1.5 text-sm text-gray-500 hover:text-gray-700 font-medium transition-colors">
                    Reset
                </a>
                <button class="px-4 py-1.5 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition-all duration-200">
                    Apply
                </button>
            </div>
        </form>
    </div>

    <!-- Job Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-gray-200 transition-all duration-300 overflow-hidden group">
                <!-- Card Header -->
                <div class="p-5 pb-4">
                    <!-- Job Type Badge -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full
                            @if($job->job_type === 'full-time') bg-green-100 text-green-700
                            @elseif($job->job_type === 'part-time') bg-blue-100 text-blue-700
                            @elseif($job->job_type === 'contract') bg-orange-100 text-orange-700
                            @elseif($job->job_type === 'internship') bg-purple-100 text-purple-700
                            @else bg-gray-100 text-gray-700
                            @endif">
                            {{ ucfirst($job->job_type) }}
                        </span>
                        @auth
                            @if(auth()->id() === $job->user_id)
                                <div class="flex items-center gap-1">
                                    <a href="/jobs/{{ $job->id }}/edit"
                                       class="p-1.5 rounded-lg text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 transition-colors"
                                       title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Are you sure you want to delete this job?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <!-- Job Title -->
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                        {{ $job->title }}
                    </h3>

                    <!-- Company Info -->
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">
                            {{ strtoupper(substr($job->user->first_name, 0, 1)) }}
                        </div>
                        <span class="text-sm text-gray-600 font-medium">
                            {{ $job->user->first_name }} {{ $job->user->last_name }}
                        </span>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-2 text-gray-500 text-sm mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $job->location }}</span>
                    </div>

                    <!-- Salary -->
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-bold text-green-600">Rs. {{ number_format($job->salary) }}</span>
                        <span class="text-xs text-gray-400">/year</span>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-5 py-4 bg-gray-50 border-t border-gray-100">
                    <a href="/jobs/{{ $job->id }}"
                       class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 text-white font-semibold text-sm rounded-xl hover:bg-indigo-700 transition-all duration-200">
                        View Details
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($jobs->isEmpty())
        <div class="text-center py-16">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-600 mb-1">No jobs found</h3>
            <p class="text-gray-400">Try adjusting your search filters</p>
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-8">
        {{ $jobs->links() }}
    </div>
</x-layout>














{{-- <x-layout>
        <x-slot:heading>
            Jobs listing
        </x-slot:heading>
        <div class="space-y-4">
            @foreach ($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500 text-sm">{{$job->user->name}}</div>  
                    <div>
                        <strong class="text-laracasts">{{ $job['title'] }}:</strong> pays ${{ $job['salary'] }}</strong> per year
                    </div>
                </a>
            @endforeach
            <div> 
                {{ $jobs->links() }}
            </div>
        </div>
</x-layout> --}}

{{-- <x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" 
               class="block px-6 py-5 border border-gray-200 rounded-lg hover:border-blue-400 hover:shadow-md transition-all duration-200 bg-white">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 text-sm font-semibold">
                                {{ substr($job->user->name, 0, 1) }}
                            </span>
                        </div>
                        <span class="text-sm font-medium text-gray-600">{{ $job->user->name }}</span>
                    </div>
                    <span class="text-xs text-gray-400">View Details →</span>
                </div>
                
                <h3 class="text-lg font-bold text-gray-900 mb-2">
                    {{ $job['title'] }}
                </h3>
                
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xl font-bold text-green-600">
                        ${{ number_format($job['salary']) }}
                    </span>
                    <span class="text-gray-500 text-sm">per year</span>
                </div>
            </a>
        @endforeach
        
        <div class="pt-4">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout> --}}





























































































{{-- <x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>
    @auth
        @if (auth()->user()->isEmployer()) 
            <div class="mb-4 flex justify-end">
                <a href="/jobs/create"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-semibold text-sm
                          rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                          focus:ring-indigo-500 transition">
                    Create Job
                </a>
            </div>
        @endif
    @endauth
    
    <form method="GET" action="/jobs" class="bg-white p-4 rounded-xl shadow-sm border mb-6">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Job title"
                class="rounded-md border-gray-300"
            />

            <input
                type="text"
                name="location"
                value="{{ request('location') }}"
                placeholder="Location"
                class="rounded-md border-gray-300"
            />

            <select name="job_type" class="rounded-md border-gray-300">
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
                class="rounded-md border-gray-300"
            />

            <input
                type="number"
                name="salary_max"
                value="{{ request('salary_max') }}"
                placeholder="Max Salary"
                class="rounded-md border-gray-300"
            />

            <select name="experience_level" class="rounded-md border-gray-300">
                <option value="">Experience</option>
                @foreach(['junior','mid','senior'] as $level)
                    <option value="{{ $level }}" @selected(request('experience_level') === $level)>
                        {{ ucfirst($level) }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="mt-4 flex justify-end gap-3">
            <a href="/jobs" class="text-sm text-gray-500 hover:underline">Reset</a>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
                Search
            </button>
        </div>
    </form>


    <div class="overflow-x-auto bg-white shadow rounded-lg">
       
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">S.N.</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">Company</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-r border-gray-200">Salary</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($jobs as $index => $job)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 font-medium text-gray-900 border-r border-gray-200">
                            {{ ($jobs->currentPage() - 1) * $jobs->perPage() + $index + 1 }}
                        </td>

                        <td class="px-3 py-2 font-medium text-gray-900 border-r border-gray-200">
                            {{ $job->title }}
                        </td>

                        <td class="px-3 py-2 text-gray-600 border-r border-gray-200">
                            {{ $job->user->first_name}}  {{ $job->user->last_name}}
                        </td>

                        <td class="px-3 py-2 text-gray-600 border-r border-gray-200">
                            {{ $job->location }}
                        </td>

                        <td class="px-3 py-2 border-r border-gray-200">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $job->job_type === 'remote' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($job->job_type) }}
                            </span>
                        </td>

                        <td class="px-3 py-2 font-semibold text-green-600 border-r border-gray-200">
                            Rs.{{ number_format($job->salary) }}
                        </td>

                        <!-- Actions -->
                        <td class="px-3 py-2 border-r border-gray-200">
                            <div class="flex items-center justify-center gap-2">

                                <!-- View Button -->
                                <a href="/jobs/{{ $job->id }}"
                                class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200"
                                title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z"/>
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </a>

                                @auth
                                    @if(auth()->id() === $job->user_id)
                                        <!-- Edit Button -->
                                        <a href="/jobs/{{ $job->id }}/edit"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-200"
                                        title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M16.862 3.487a2.121 2.121 0 113 3L7.5 18.75H3v-4.5L16.862 3.487z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Button -->
                                        <form method="POST"
                                            action="/jobs/{{ $job->id }}"
                                            onsubmit="return confirm('Are you sure you want to delete this job?')"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors duration-200"
                                                    title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth

                            </div>
                        </td>


                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout> --}}