{{-- <x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>    
</x-layout> --}}

<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <!-- Hero Section -->
   <section class="bg-gradient-to-r from-gray-50 to-blue-300 text-gray-900 py-20">
        <div class="container mx-auto px-4 text-center max-w-4xl">
            <h1 class="text-5xl font-bold mb-4">Find Your Dream Job Today</h1>
            <p class="text-xl mb-8">Connect with top employers and discover opportunities that match your skills</p>
            
            <!-- Search Bar -->
            {{-- <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-2 flex flex-col md:flex-row gap-2">
                <input type="text" placeholder="Job title or keyword" class="flex-1 px-4 py-3 rounded text-gray-800 focus:outline-none">
                <input type="text" placeholder="Location" class="flex-1 px-4 py-3 rounded text-gray-800 focus:outline-none">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded font-semibold">Search Jobs</button>
            </div> --}}
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-4xl font-bold text-blue-600">10,000+</h3>
                <p class="text-gray-600">Active Jobs</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-blue-600">5,000+</h3>
                <p class="text-gray-600">Companies</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-blue-600">50,000+</h3>
                <p class="text-gray-600">Job Seekers</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-blue-600">8,000+</h3>
                <p class="text-gray-600">Successful Hires</p>
            </div>
        </div>
    </section>

    {{-- <!-- Featured Jobs -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Featured Jobs</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card Example -->
                <div class="bg-white border rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="font-bold text-lg">Senior Developer</h3>
                            <p class="text-gray-600">Tech Company Inc.</p>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Full-time</span>
                    </div>
                    <p class="text-gray-700 text-sm mb-4">Location: Remote</p>
                    <p class="text-blue-600 font-semibold">$80,000 - $120,000</p>
                </div>
                <!-- Add more job cards -->
            </div>
        </div>
    </section> --}}

    {{-- <!-- Job Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Browse by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-3xl mb-2">💻</div>
                    <h4 class="font-semibold">Technology</h4>
                    <p class="text-sm text-gray-600">1,200 jobs</p>
                </a>
                <!-- Add more categories -->
            </div>
        </div>
    </section> --}}

    <!-- How It Works -->
    <section class="py-16">
        <div class="container mx-auto px-4 max-w-5xl">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-blue-600">1</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Create Profile</h3>
                    <p class="text-gray-600">Sign up and build your professional profile in minutes</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-blue-600">2</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Search & Apply</h3>
                    <p class="text-gray-600">Browse thousands of jobs and apply with one click</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-blue-600">3</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Get Hired</h3>
                    <p class="text-gray-600">Connect with employers and land your dream job</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4max-w-6xl">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Users Say</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"Found my dream job within 2 weeks of signing up. The platform is easy to use and has great opportunities."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <p class="font-semibold">Sarah Johnson</p>
                            <p class="text-sm text-gray-600">Software Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"The job matching algorithm is incredible! I received relevant opportunities that perfectly aligned with my skills and experience."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <p class="font-semibold">Michael Chen</p>
                            <p class="text-sm text-gray-600">Product Manager</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"Transitioning careers seemed daunting, but this platform made it possible. I landed a role in tech within a month!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                        <div>
                            <p class="font-semibold">David Park</p>
                            <p class="text-sm text-gray-600">Data Analyst</p>
                        </div>
                    </div>
                </div>
                <!-- Add more testimonials -->
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-gray-50 to-blue-300 text-gray-900 py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-4">Ready to Get Started?</h2>
            <p class="text-xl mb-8">Join thousands of job seekers finding their perfect match</p>
            <div class="flex gap-4 justify-center">
                <a href="/register" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">Sign Up Now</a>
                <a href="/jobs" class="border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">Browse Jobs</a>
            </div>
        </div>
    </section>
    
</x-layout>