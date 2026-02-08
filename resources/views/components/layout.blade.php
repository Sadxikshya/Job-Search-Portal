<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.8/dist/trix.css">
    <script src="https://unpkg.com/trix@2.1.8/dist/trix.umd.min.js" defer></script>
    <style>
        .trix-content ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .trix-content ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .trix-content li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="h-full">

<div class="min-h-full">
  <!-- Modern Navigation Bar -->
  <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <!-- Logo Section -->
        <div class="flex items-center">
          <div class="shrink-0">
            <a href="/" class="flex items-center space-x-2 group">
              <div class="w-10 h-10 rounded-lg flex items-center justify-center transform group-hover:scale-105 transition-transform duration-200"  style="background-color: rgba(59,130,246,.5);">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
              </div>
              <span class="text-xl font-bold text-gray-900">JobPortal</span>
            </a>
          </div>
          
          <!-- Desktop Navigation Links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-1">
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
              <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
              @auth
                  <x-nav-link href="/profile" :active="request()->is('profile')">
                      My Profile
                  </x-nav-link>
              @endauth  
            </div>
          </div>
        </div>

        <!-- Right Side Actions -->
        <div class="hidden md:block">
          <div class="flex items-center gap-3">
            @guest
              <a href="/login" class="text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-medium transition-colors duration-200">
                Sign In
              </a>
              <a href="/register" class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 px-5 py-2 rounded-lg text-sm font-semibold transition-all duration-200">
                Sign Up
              </a>
            @endguest

            @auth
                @if (auth()->user()->isEmployer()) 
                  <a href="/jobs/create" class="bg-blue-400 text-white hover:bg-blue-700 px-5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                    Post a Job
                  </a>
                @endif
                
                <!-- Hybrid Logout: Handles both API and Web logout -->
                <form method="POST" action="/logout" id="logoutForm" class="inline-block">
                  @csrf
                  <button type="button" id="logoutBtn" class="text-gray-700 hover:text-red-600 px-4 py-2 text-sm font-medium transition-colors duration-200">
                    Sign Out
                  </button>
                </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    {{$slot}}
  </main>
</div>

<script>
// Prevent file uploads in Trix editor
document.addEventListener("trix-file-accept", function (event) {
    event.preventDefault();
});

// Logout handler
document.getElementById('logoutBtn')?.addEventListener('click', async function(e) {
    e.preventDefault();
    
    const token = localStorage.getItem('auth_token');
    
    if (token) {
        // API logout
        try {
            const response = await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });
            
            const data = await response.json();
            console.log('Logout response:', data);
            
            // Clear localStorage
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user');
            
        } catch (error) {
            console.error('Logout error:', error);
        }
    }
    
    // Always submit the form to clear session
    document.getElementById('logoutForm').submit();
});
</script>

</body>
</html>
