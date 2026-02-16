<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden" style="background-color: rgba(59,130,246,.5);">
        <!-- Subtle animated background -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-4 py-16 md:py-20 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Content -->
                <div class="text-center space-y-6">
                    <!-- Badge -->
                    <div class="inline-block">
                        <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border border-white/30">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span class="text-sm font-medium">{{ number_format($stats['active_jobs']) }}+opportunities available</span>
                        </div>
                    </div>

                    <!-- Headline -->
                    <div class="space-y-3">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                            Your Dream Job
                            <span class="block bg-gradient-to-r from-yellow-200 to-pink-200 bg-clip-text text-transparent">
                                Starts Here
                            </span>
                        </h1>
                        <p class="text-lg md:text-xl text-blue-50 max-w-2xl mx-auto">
                            Discover opportunities at top companies and take the next step in your career journey
                        </p>
                    </div>
                    
                    <!-- Search Bar -->
                    {{-- <div class="mt-12 max-w-4xl mx-auto">
                        <div class="bg-white rounded-xl shadow-2xl p-2">
                            <form class="flex flex-col md:flex-row gap-2">
                                <div class="flex-1">
                                    <input 
                                        type="text" 
                                        placeholder="Job title, keywords, or company" 
                                        class="w-full px-5 py-4 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                    />
                                </div>
                                <div class="flex-1">
                                    <input 
                                        type="text" 
                                        placeholder="City, state, or remote" 
                                        class="w-full px-5 py-4 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                    />
                                </div>
                                <button 
                                    type="submit" 
                                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-10 py-4 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl"
                                >
                                    Search Jobs
                                </button>
                            </form>
                        </div>
                        
                        <div class="mt-4 flex flex-wrap items-center justify-center gap-2 text-sm">
                            <span class="text-blue-100">Trending:</span>
                            <a href="#" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-full transition-colors">Remote Work</a>
                            <a href="#" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-full transition-colors">Engineering</a>
                            <a href="#" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-full transition-colors">Marketing</a>
                            <a href="#" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-full transition-colors">Product Design</a>
                        </div>
                    </div> --}}

                    <!-- CTA & Stats -->
                    <div class="flex flex-col md:flex-row items-center justify-center gap-6 pt-6">
                        <!-- Employer CTA -->
                        <a href="/jobs/create" class="group flex items-center gap-3 bg-white/10 hover:bg-white/15 backdrop-blur-sm px-6 py-3 rounded-lg border border-white/20 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>For Employers:</span>
                            <span class="font-semibold group-hover:underline">Post a Job →</span>
                        </a>

                        <!-- Stats -->
                        <div class="flex items-center gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold">{{ number_format($stats['job_seekers']) }}+</div>
                                <div class="text-sm text-blue-100">Job Seekers</div>
                            </div>
                            <div class="h-8 w-px bg-white/30"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold"> {{ number_format($stats['companies']) }}+</div>
                                <div class="text-sm text-blue-100">Companies</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path d="M0 80L60 73.3C120 66.7 240 53.3 360 46.7C480 40 600 40 720 46.7C840 53.3 960 66.7 1080 70C1200 73.3 1320 66.7 1380 63.3L1440 60V80H1380C1320 80 1200 80 1080 80C960 80 840 80 720 80C600 80 480 80 360 80C240 80 120 80 60 80H0Z" fill="white" fill-opacity="0.1"/>
            </svg>
        </div>
    </section>

    <!-- Trust Indicators / Quick Stats -->
    <section class="py-16 bg-white border-b">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto">

                <div class="text-center">
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">
                        {{ number_format($stats['active_jobs']) }}+
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base">Active Jobs</p>
                </div>

                <div class="text-center">
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">
                        {{ number_format($stats['companies']) }}+
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base">Companies Hiring</p>
                </div>

                <div class="text-center">
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">
                        {{ number_format($stats['job_seekers']) }}+
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base">Active Job Seekers</p>
                </div>

                <div class="text-center">
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">
                        {{ number_format($stats['successful_hires']) }}+
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base">Successful Hires</p>
                </div>

            </div>
        </div>
    </section>


    <!-- Popular Job Categories -->
    {{-- <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Browse Jobs by Category
                </h2>
                <p class="text-lg text-gray-600">
                    Explore opportunities in your field
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 max-w-6xl mx-auto">
                <a href="/jobs?category=technology" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">💻</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Technology</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">1,200 jobs</p>
                </a>
                
                <a href="/jobs?category=healthcare" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">🏥</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Healthcare</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">890 jobs</p>
                </a>
                
                <a href="/jobs?category=finance" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">💰</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Finance</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">650 jobs</p>
                </a>
                
                <a href="/jobs?category=marketing" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">📱</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Marketing</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">540 jobs</p>
                </a>
                
                <a href="/jobs?category=design" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">🎨</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Design</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">420 jobs</p>
                </a>
                
                <a href="/jobs?category=education" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                    <div class="text-4xl mb-3 text-center">📚</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Education</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">380 jobs</p>
                </a>
            </div>
        </div>
    </section> --}}


    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Browse Jobs by Job type
                </h2>
                <p class="text-lg text-gray-600">
                   Explore the Job suitable for you
                </p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-4 max-w-6xl mx-auto">
                <a href="/jobs?job_type=full-time" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 w-40">
                    <div class="text-4xl mb-3 text-center">💼</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Full-TIme</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">{{ number_format($stats['full_time']) }}+ jobs</p>
                </a>
                
                <a href="/jobs?job_type=part-time" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 w-40">
                    <div class="text-4xl mb-3 text-center">⏰</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Part-Time</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">{{ number_format($stats['part_time']) }}+ jobs </p>
                </a>
                
                <a href="/jobs?job_type=contract" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 w-40">
                    <div class="text-4xl mb-3 text-center">📝</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Contract</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">{{ number_format($stats['contract']) }}+ jobs</p>
                </a>
                
                <a href="/jobs?job_type=internship" class="group bg-white p-6 rounded-xl hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 w-40">
                    <div class="text-4xl mb-3 text-center">🎓</div>
                    <h4 class="font-semibold text-center text-gray-900 group-hover:text-blue-600 transition-colors">Internship</h4>
                    <p class="text-sm text-gray-500 text-center mt-1">{{ number_format($stats['internship']) }}+ jobs</p>
                </a>
            
            </div>
        </div>
    </section>

   <!-- Featured Jobs Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                        Featured Opportunities
                    </h2>
                    <p class="text-lg text-gray-600">
                        Hand-picked jobs from top companies
                    </p>
                </div>
                <a href="/jobs" class="hidden md:inline-block text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                    View All Jobs →
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @forelse ($jobs as $job)
                    <div class="bg-white border-2 border-gray-200 rounded-xl p-6 hover:shadow-xl hover:border-blue-300 transition-all duration-300 group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="font-bold text-xl text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">
                                    {{ $job['title'] }}
                                </h3>
                                <p class="text-gray-600 font-medium">
                                    {{ trim(($job['user']['first_name'] ?? '') . ' ' . ($job['user']['last_name'] ?? '')) ?: 'Unknown Company' }}
                                </p>
                            </div>
                            <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-gray-600 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $job['location'] }}
                            </div>
                            <div class="flex items-center text-gray-600 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ ucfirst($job['job_type']) }}
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <p class="text-blue-600 font-bold text-lg">${{ number_format($job['salary']) }}</p>
                            <a href="/jobs/{{ $job['id'] }}"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                Apply
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">No jobs found.</p>
                @endforelse
            </div>

            <div class="text-center mt-12 md:hidden">
                <a href="/jobs" class="inline-block text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                    View All Jobs →
                </a>
            </div>
        </div>
    </section>


    <!-- How It Works - Dual Flow -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    How It Works
                </h2>
                <p class="text-lg text-gray-600">
                    Get started in three simple steps
                </p>
            </div>

            <!-- Tab Navigation -->
            <div class="flex justify-center mb-12">
                <div class="inline-flex bg-white rounded-xl p-1 shadow-md">
                    <button class="px-8 py-3 rounded-lg font-semibold bg-blue-600 text-white transition-all" id="jobSeekersTab">
                        For Job Seekers
                    </button>
                    <button class="px-8 py-3 rounded-lg font-semibold text-gray-600 hover:text-gray-900 transition-all" id="employersTab">
                        For Employers
                    </button>
                </div>
            </div>

            <!-- Job Seekers Flow -->
            <div id="jobSeekersContent" class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">1</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Create Your Profile</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Sign up in minutes and showcase your skills, experience, and career goals with our easy profile builder.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">2</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Search & Apply</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Browse thousands of opportunities, get personalized recommendations, and apply with one click.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">3</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Get Hired</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Connect directly with hiring managers, track your applications, and land your dream job.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Employers Flow (Hidden by default) -->
            <div id="employersContent" class="max-w-5xl mx-auto hidden">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">1</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Post Your Job</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Create detailed job listings that attract qualified candidates. Include salary, benefits, and requirements.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">2</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Review Candidates</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Access qualified candidates, review profiles and resumes, and use our filtering tools to find the best fit.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">3</span>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-center text-gray-900">Hire Top Talent</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Schedule interviews, communicate directly with candidates, and build your dream team faster.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Tab switching functionality
            const jobSeekersTab = document.getElementById('jobSeekersTab');
            const employersTab = document.getElementById('employersTab');
            const jobSeekersContent = document.getElementById('jobSeekersContent');
            const employersContent = document.getElementById('employersContent');

            jobSeekersTab.addEventListener('click', () => {
                jobSeekersTab.classList.add('bg-blue-600', 'text-white');
                jobSeekersTab.classList.remove('text-gray-600');
                employersTab.classList.remove('bg-blue-600', 'text-white');
                employersTab.classList.add('text-gray-600');
                jobSeekersContent.classList.remove('hidden');
                employersContent.classList.add('hidden');
            });

            employersTab.addEventListener('click', () => {
                employersTab.classList.add('bg-blue-600', 'text-white');
                employersTab.classList.remove('text-gray-600');
                jobSeekersTab.classList.remove('bg-blue-600', 'text-white');
                jobSeekersTab.classList.add('text-gray-600');
                employersContent.classList.remove('hidden');
                jobSeekersContent.classList.add('hidden');
            });
        </script>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Success Stories
                </h2>
                <p class="text-lg text-gray-600">
                    See what our users have to say
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-lg border border-blue-100">
                    <div class="flex mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "Found my dream job within 2 weeks of signing up. The platform is intuitive and the job matching is spot-on. Couldn't be happier!"
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full mr-4 flex items-center justify-center text-white font-bold text-lg">
                            SJ
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Sarah Johnson</p>
                            <p class="text-sm text-gray-600">Software Engineer at TechCorp</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-xl shadow-lg border border-purple-100">
                    <div class="flex mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "The job recommendations were incredibly accurate. I received opportunities that perfectly matched my skills and career goals. Highly recommend!"
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full mr-4 flex items-center justify-center text-white font-bold text-lg">
                            MC
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Michael Chen</p>
                            <p class="text-sm text-gray-600">Product Manager at StartupCo</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-lg border border-green-100">
                    <div class="flex mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 mb-6 leading-relaxed italic">
                        "Transitioning careers felt impossible until I found this platform. I landed a tech role within a month. The resources and support were invaluable."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full mr-4 flex items-center justify-center text-white font-bold text-lg">
                            DP
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">David Park</p>
                            <p class="text-sm text-gray-600">Data Analyst at Analytics Pro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Career Resources Preview -->
    {{-- <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Career Resources
                </h2>
                <p class="text-lg text-gray-600">
                    Expert advice to help you succeed
                </p>
            </div>

            

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <a href="/resources/resume-tips" class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-blue-600 transition-colors">
                            Resume Writing Guide
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Learn how to craft a resume that gets you noticed by recruiters and hiring managers.
                        </p>
                        <span class="text-blue-600 font-semibold group-hover:underline">
                            Read More →
                        </span>
                    </div>
                </a>

                <a href="/resources/interview-prep" class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-purple-600 transition-colors">
                            Interview Preparation
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Master common interview questions and learn strategies to make a lasting impression.
                        </p>
                        <span class="text-purple-600 font-semibold group-hover:underline">
                            Read More →
                        </span>
                    </div>
                </a>

                <a href="/resources/salary-guide" class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-green-600 transition-colors">
                            Salary Negotiation Tips
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Discover how to negotiate your salary and benefits package with confidence.
                        </p>
                        <span class="text-green-600 font-semibold group-hover:underline">
                            Read More →
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section> --}}

    <!-- Company Logos / Social Proof -->
    <section class="py-16 bg-white border-y">
        <div class="container mx-auto px-4">
            <p class="text-center text-gray-600 mb-8 font-semibold">
                TRUSTED BY LEADING COMPANIES
            </p>
            <div class="flex flex-wrap justify-center items-center gap-12 opacity-60">
                <a href="https://hamrobazaar.com/" class="text-3xl font-bold text-gray-800">Hamro Bazar</a>
                <a href="https://f1soft.com/"class="text-3xl font-bold text-gray-800">F1soft</a>
                <a href="https://esewatravels.com/" class="text-3xl font-bold text-gray-800">Esewa Tour and Travels</a>
                
            </div>
        </div>
    </section>

    <!-- Final Call to Action -->
    <section class="relative text-white py-24" style="background-color: rgba(59,130,246,.5);">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-4 text-center relative z-10 max-w-4xl">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Take the Next Step?
            </h2>
            <p class="text-xl md:text-2xl mb-10 text-blue-100">
                Join thousands of professionals who found their dream job through our platform
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-1">
                    Create Free Account
                </a>
                <a href="/jobs" class="border-2 border-white text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 hover:-translate-y-1">
                    Browse All Jobs
                </a>
            </div>
        </div>
    </section>
</x-layout>