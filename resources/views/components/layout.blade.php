<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
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
  <nav class="bg-blue-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
              <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
              @auth
                  <x-nav-link href="/profile">
                      My Profile
                  </x-nav-link>
              @endauth  
            </div>
          </div>

        </div>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-white">{{$heading}}</h1>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center gap-3 md:ml-6">
            @guest
              
              <x-nav-link href="/login" >LogIn </x-nav-link>
              <x-nav-link href="/register" >Register </x-nav-link>
            @endguest

            
            @auth
                @if (auth()->user()->isEmployer()) 
                <x-button href="/jobs/create">Create Job</x-button>
                @endif
            @endauth


            @auth
              <form method="POST" action="/logout">
              @csrf
              <x-form-button>logout</x-form-button>
              </form>
            @endauth
            
          </div>
        </div>

        
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        @auth
          <x-nav-link href="/profile">
                My Profile
          </x-nav-link>
        @endauth        
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">
        @guest
            <x-nav-link href="/login">Login</x-nav-link>
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <x-nav-link href="/register">Register</x-nav-link>
        @endguest
         
        @auth
            <form method="POST" action="/logout">
              @csrf
              <x-form-button>logout</x-form-button>
            </form>
        @endauth
      </div>
    </el-disclosure>
  </nav>

  <header class="relative bg-blue-800/50 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
    
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{$slot}}
    </div>
  </main>
</div>

<script>
document.addEventListener("trix-file-accept", function (event) {
    event.preventDefault();
});
</script>

</body>
</html>