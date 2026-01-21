<x-layout>
    <x-slot:heading>
        Edit Job: {{$job->title}}
    </x-slot:heading>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <form method="POST" action="/jobs/{{$job->id}}">
                @csrf 
                @method('PATCH')
                
                <div class="space-y-8">
                    <!-- Job Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
                            Job Title
                        </label>
                        <input
                            id="title" 
                            type="text"
                            name="title"
                            placeholder="e.g., Software Engineer" 
                            value="{{$job->title}}"
                            class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                            required
                        />
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-900 mb-2">
                            Salary
                        </label>
                        <input 
                            id="salary"
                            type="text" 
                            name="salary"
                            value="{{$job->salary}}"
                            placeholder="e.g., $50,000 - $70,000" 
                            class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                            required
                        />
                        @error('salary')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
                            Job Description
                        </label>
                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Job Description
                            </label>

                            <input id="description" type="hidden" name="description"
                                value="{{ old('description', $job->description) }}">

                            <trix-editor input="description" class="mt-1 trix-content"></trix-editor>

                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-900 mb-2">
                            Location
                        </label>
                        <input
                            id="location"
                            name="location"
                            type="text"
                            value="{{ $job->location }}"
                            placeholder="e.g., New York, NY"
                            class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                            required
                        />
                        @error('location')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Two Column Grid for Select Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Job Type -->
                        <div>
                            <label for="job_type" class="block text-sm font-medium text-gray-900 mb-2">
                                Job Type
                            </label>
                            <select 
                                id="job_type" 
                                name="job_type" 
                                class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                                required
                            >
                                <option value="full-time" @selected($job->job_type === 'full-time')>Full Time</option>
                                <option value="part-time" @selected($job->job_type === 'part-time')>Part Time</option>
                                <option value="remote" @selected($job->job_type === 'remote')>Remote</option>
                            </select>
                            @error('job_type')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Education -->
                        <div>
                            <label for="education" class="block text-sm font-medium text-gray-900 mb-2">
                                Education Level
                            </label>
                            <select
                                id="education"
                                name="education"
                                class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                                required
                            >
                                <option value="">Select education level</option>
                                <option value="high-school" @selected($job->education === 'high-school')>High School</option>
                                <option value="diploma" @selected($job->education === 'diploma')>Diploma</option>
                                <option value="bachelor" @selected($job->education === 'bachelor')>Bachelor's Degree</option>
                                <option value="master" @selected($job->education === 'master')>Master's Degree</option>
                                <option value="phd" @selected($job->education === 'phd')>PhD</option>
                            </select>
                            @error('education')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Experience Level -->
                    <div>
                        <label for="experience_level" class="block text-sm font-medium text-gray-900 mb-2">
                            Experience Level
                        </label>
                        <select
                            id="experience_level"
                            name="experience_level"
                            class="block w-full rounded-md border border-gray-300 bg-white px-4 py-2.5 text-gray-900 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                            required
                        >
                            <option value="">Select experience level</option>
                            <option value="Entry Level" @selected($job->experience_level === 'Entry Level')>Entry Level</option>
                            <option value="Mid Level" @selected($job->experience_level === 'Mid Level')>Mid Level</option>
                            <option value="Senior Level" @selected($job->experience_level === 'Senior Level')>Senior Level</option>
                            <option value="Lead/Manager" @selected($job->experience_level === 'Lead/Manager')>Lead/Manager</option>
                        </select>
                        @error('experience_level')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-between">
                    <button 
                        form="delete-form" 
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-700 bg-red-50 rounded-md hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors"
                    >
                        Delete Job
                    </button>

                    <div class="flex items-center gap-3">
                        <a 
                            href="/jobs/{{$job->id}}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors"
                        >
                            Cancel
                        </a>
                        
                        <button 
                            type="submit"
                            class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors shadow-sm"
                        >
                            Update Job
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Delete Form -->
    <form method="POST" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>