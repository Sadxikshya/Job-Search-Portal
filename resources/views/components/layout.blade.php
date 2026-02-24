<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.8/dist/trix.css">
    <script src="https://unpkg.com/trix@2.1.8/dist/trix.umd.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

    <style>
        :root {
            --sky:    #daeef5;
            --frost:  #eef6f9;
            --mist:   #c8e4ed;
            --pool:   #7bbfd4;
            --deep:   #3a7d96;
            --ink:    #1a2b33;
            --body:   #4a6270;
            --ghost:  #8fadb8;
            --border: #d4e8f0;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #fff;
            color: var(--body);
            -webkit-font-smoothing: antialiased;
        }

        /* ── Trix rich-text list styles ── */
        .trix-content ul { list-style-type: disc;    margin-left: 1.5rem; margin-bottom: 1rem; }
        .trix-content ol { list-style-type: decimal; margin-left: 1.5rem; margin-bottom: 1rem; }
        .trix-content li { margin-bottom: 0.5rem; }

        /* ── Nav ── */
        .site-nav {
            position: sticky; top: 0; z-index: 200;
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            max-width: 1280px; margin: 0 auto;
            padding: 0 2rem;
            height: 64px;
            display: flex; align-items: center; justify-content: space-between;
        }

        /* Logo */
        .nav-logo {
            display: flex; align-items: center; gap: .6rem;
            text-decoration: none;
            font-family: 'DM Serif Display', serif;
            font-size: 1.35rem;
            color: var(--ink);
            letter-spacing: -.02em;
        }

        .nav-logo-mark {
            width: 36px; height: 36px; border-radius: 10px;
            background: var(--pool);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            transition: background .2s;
        }
        .nav-logo:hover .nav-logo-mark { background: var(--deep); }
        .nav-logo em { font-style: normal; color: var(--pool); }

        /* Desktop links wrapper */
        .nav-links {
            display: flex; align-items: center; gap: .25rem;
        }

        /* Auth actions */
        .nav-actions {
            display: flex; align-items: center; gap: .75rem;
        }

        .nav-signin {
            color: var(--body);
            font-size: .9rem; font-weight: 500;
            text-decoration: none;
            padding: .5rem 1rem;
            border-radius: 8px;
            transition: color .2s, background .2s;
        }
        .nav-signin:hover { color: var(--ink); background: var(--frost); }

        .nav-btn {
            display: inline-flex; align-items: center; gap: .4rem;
            font-size: .85rem; font-weight: 600;
            padding: .55rem 1.25rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all .2s;
        }
        .nav-btn-outline {
            background: transparent;
            color: var(--pool);
            border: 1.5px solid var(--mist);
        }
        .nav-btn-outline:hover { border-color: var(--pool); background: var(--sky); }

        .nav-btn-solid {
            background: var(--pool);
            color: #fff;
            border: 1.5px solid transparent;
            box-shadow: 0 2px 10px rgba(123,191,212,.3);
        }
        .nav-btn-solid:hover { background: var(--deep); box-shadow: 0 4px 16px rgba(58,125,150,.3); transform: translateY(-1px); }

        .nav-btn-danger {
            background: transparent;
            color: var(--ghost);
            border: 1.5px solid var(--border);
        }
        .nav-btn-danger:hover { color: #c53030; border-color: #fc8181; background: #fff5f5; }

        /* ── Notification bell ── */
        .nav-bell {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px; height: 38px;
            border-radius: 10px;
            color: var(--ghost);
            border: 1.5px solid var(--border);
            text-decoration: none;
            transition: color .2s, background .2s, border-color .2s;
        }
        .nav-bell:hover {
            color: var(--deep);
            background: var(--sky);
            border-color: var(--mist);
        }
        .nav-bell-badge {
            position: absolute;
            top: -5px; right: -5px;
            min-width: 18px; height: 18px;
            padding: 0 4px;
            border-radius: 9999px;
            background: #e53e3e;
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            border: 2px solid #fff;
            line-height: 1;
        }

        /* Mobile hide */
        @media (max-width: 768px) {
            .nav-links, .nav-actions { display: none; }
        }
    </style>
</head>

<body class="h-full">

<div class="min-h-full">

    {{-- ── NAVIGATION ── --}}
    <nav class="site-nav">
        <div class="nav-inner">

            {{-- Logo --}}
            <a href="/" class="nav-logo">
                <div class="nav-logo-mark">
                    <svg width="18" height="18" fill="none" stroke="#fff" viewBox="0 0 24 24" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                Career<em>Hub</em>
            </a>

            {{-- Desktop nav links --}}
            <div class="nav-links">
                <x-nav-link href="/"        :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs"    :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                @auth
                    <x-nav-link href="/profile" :active="request()->is('profile')">My Profile</x-nav-link>
                @endauth
            </div>

            {{-- Auth actions --}}
            <div class="nav-actions">
                @guest
                    <a href="/login"    class="nav-signin">Sign In</a>
                    <a href="/register" class="nav-btn nav-btn-outline">Sign Up</a>
                @endguest

                @auth
                    {{-- ── Notification Bell ── --}}
                    @php
                        $unreadCount = auth()->user()->unreadNotifications()->count();
                    @endphp
                    <a href="{{ route('notifications.index') }}"
                       class="nav-bell"
                       title="Notifications{{ $unreadCount > 0 ? " ($unreadCount unread)" : '' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 17H20L18.595 15.595A1.8 1.8 0 0118 14.382V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.382a1.8 1.8 0 01-.595 1.023L4 17h5m6 0a3 3 0 01-6 0m6 0H9"/>
                        </svg>
                        @if($unreadCount > 0)
                            <span class="nav-bell-badge">
                                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                            </span>
                        @endif
                    </a>

                    @if(auth()->user()->isEmployer())
                        <a href="/jobs/create" class="nav-btn nav-btn-solid">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14M5 12h14"/>
                            </svg>
                            Post a Job
                        </a>
                    @endif

                    <form method="POST" action="/logout" id="logoutForm" class="inline-block">
                        @csrf
                        <button type="button" id="logoutBtn" class="nav-btn nav-btn-danger">
                            Sign Out
                        </button>
                    </form>
                @endauth
            </div>

        </div>
    </nav>

    {{-- ── MAIN CONTENT ── --}}
    <main>
        {{ $slot }}
    </main>

</div>

<script>
// Prevent file uploads in Trix editor
document.addEventListener("trix-file-accept", function(event) {
    event.preventDefault();
});

// Hybrid logout (API token + session)
document.getElementById('logoutBtn')?.addEventListener('click', async function(e) {
    e.preventDefault();

    const token = localStorage.getItem('auth_token');

    if (token) {
        try {
            await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });
        } catch (err) {
            console.error('API logout error:', err);
        }

        localStorage.removeItem('auth_token');
        localStorage.removeItem('user');
    }

    document.getElementById('logoutForm').submit();
});
</script>

</body>
</html>