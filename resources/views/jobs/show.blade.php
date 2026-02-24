<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@400;500;600&display=swap');

        /* inherits --pool #7bbfd4, --deep #3a7d96, --sky, --mist, --frost, --border, --ghost, --ink, --body from profile.css */

        .jd-root {
            background: var(--frost);
        }

        .jd-root, .jd-root p, .jd-root span, .jd-root a, .jd-root button, .jd-root label, .jd-root input {
            font-family: 'DM Sans', sans-serif;
        }

        .jd-title, .jd-stat-val, .jd-section-title, .jd-apply-heading, .jd-employer-avatar {
            font-family: 'Playfair Display', serif !important;
        }

        /* ── HERO ── */
        .jd-hero {
            background: var(--deep);
            padding: 2rem 0 0;
            position: relative;
            overflow: hidden;
        }

        .jd-hero::before {
            content: '';
            position: absolute;
            top: -60px; right: -80px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(123,191,212,.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .jd-hero-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 2.5rem 2rem;
        }

        .jd-back {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: rgba(255,255,255,.35);
            text-decoration: none;
            margin-bottom: 1.5rem;
            transition: color .2s;
        }
        .jd-back:hover { color: rgba(255,255,255,.75); }

        .jd-category {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .28rem .85rem;
            border-radius: 999px;
            background: rgba(123,191,212,.2);
            border: 1px solid rgba(123,191,212,.35);
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #bfe8f5;
            margin-bottom: 1.2rem;
        }

        .jd-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.7rem, 4vw, 2.7rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.08;
            letter-spacing: -.02em;
            margin-bottom: 1.25rem;
            max-width: 640px;
        }

        .jd-hero-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .jd-hero-meta-item {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .8rem;
            color: rgba(255,255,255,.45);
        }

        .jd-edit-btn {
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .5rem 1rem;
            border-radius: 8px;
            font-size: .76rem;
            font-weight: 600;
            color: rgba(255,255,255,.65);
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.1);
            text-decoration: none;
            transition: background .2s, color .2s;
        }
        .jd-edit-btn:hover { background: rgba(255,255,255,.13); color: #fff; }

        /* ── STAT STRIP ── */
        .jd-strip {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .jd-strip-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 2.5rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .jd-stat {
            padding: 1.4rem 1.25rem;
            border-right: 1px solid var(--border);
        }
        .jd-stat:first-child { padding-left: 0; }
        .jd-stat:last-child { border-right: none; }

        .jd-stat-lbl {
            font-size: .61rem;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--ghost);
            margin-bottom: .3rem;
        }

        .jd-stat-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.1;
        }

        .jd-stat-sub { font-size: .68rem; color: var(--ghost); margin-top: .18rem; }

        /* ── BODY ── */
        .jd-body {
            max-width: 960px;
            margin: 0 auto;
            padding: 3.5rem 2.5rem 5rem;
            display: grid;
            grid-template-columns: 1fr 290px;
            gap: 4rem;
            align-items: start;
        }

        .jd-section { margin-bottom: 3rem; }

        .jd-section-eyebrow {
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .5rem;
        }

        .jd-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 1rem;
            padding-bottom: .65rem;
            border-bottom: 2px solid var(--ink);
            display: inline-block;
        }

        .jd-desc {
            font-size: .92rem;
            color: #374151;
            line-height: 1.9;
        }

        /* Requirements */
        .jd-req-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
        }

        .jd-req-chip {
            padding: .85rem 1rem .85rem 1.15rem;
            background: #fff;
            border: 1.5px solid var(--border);
            border-left: 3px solid var(--pool);
            border-radius: 0 10px 10px 0;
            transition: border-color .18s;
        }
        .jd-req-chip:hover { border-color: var(--pool); border-left-color: var(--pool); }

        .jd-req-chip-lbl {
            font-size: .61rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--ghost);
            margin-bottom: .3rem;
        }

        .jd-req-chip-val {
            font-size: .88rem;
            font-weight: 600;
            color: var(--ink);
        }

        /* ── SIDEBAR ── */
        .jd-sidebar { position: sticky; top: 2rem; }

        .jd-employer {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 1.1rem;
        }

        .jd-employer-top {
            background: var(--deep);
            padding: 1.4rem 1.3rem;
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .jd-employer-avatar {
            width: 44px; height: 44px;
            border-radius: 50%;
            background: rgba(255,255,255,.1);
            border: 2px solid rgba(255,255,255,.18);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: #fff;
            flex-shrink: 0;
        }

        .jd-employer-name { font-size: .9rem; font-weight: 600; color: #fff; }
        .jd-employer-email { font-size: .7rem; color: rgba(255,255,255,.4); margin-top: .1rem; }

        .jd-employer-body { padding: .9rem 1.1rem; }
        .jd-employer-lbl { font-size: .61rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--ghost); margin-bottom: .25rem; }
        .jd-employer-val { font-size: .82rem; color: var(--ink); }

        /* Apply card */
        .jd-apply-card {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 1.4rem;
        }

        .jd-apply-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            color: var(--ink);
            margin-bottom: .35rem;
        }

        .jd-apply-sub {
            font-size: .77rem;
            color: var(--ghost);
            margin-bottom: 1.15rem;
            line-height: 1.65;
        }

        .btn-apply {
            width: 100%;
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            padding: .82rem;
            background: var(--pool);
            color: #fff;
            font-size: .86rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 3px 14px rgba(123,191,212,.3);
            transition: background .18s, transform .15s;
        }
        .btn-apply:hover { background: var(--deep); transform: translateY(-1px); }

        .btn-view-apps {
            width: 100%;
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            padding: .82rem;
            background: var(--sky);
            color: var(--deep);
            font-size: .86rem;
            font-weight: 700;
            border: 1.5px solid var(--mist);
            border-radius: 10px;
            text-decoration: none;
            transition: background .18s, border-color .18s;
        }
        .btn-view-apps:hover { background: var(--mist); border-color: var(--pool); }

        .applied-badge {
            width: 100%;
            display: flex; align-items: center; justify-content: center; gap: .55rem;
            padding: .82rem;
            background: #f0fdf4;
            border: 1.5px solid #86efac;
            border-radius: 10px;
            font-size: .84rem;
            font-weight: 600;
            color: #15803d;
        }

        .btn-login {
            width: 100%;
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            padding: .82rem;
            background: var(--pool);
            color: #fff;
            font-size: .86rem;
            font-weight: 700;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 3px 14px rgba(123,191,212,.3);
            transition: background .18s;
        }
        .btn-login:hover { background: var(--deep); }

        .guest-note p { font-size: .78rem; color: var(--ghost); margin-bottom: .9rem; line-height: 1.6; }

        .jd-posted { font-size: .7rem; color: var(--ghost); text-align: center; margin-top: .85rem; }

        @media (max-width: 760px) {
            .jd-body { grid-template-columns: 1fr; gap: 2.5rem; }
            .jd-sidebar { position: static; }
            .jd-strip-inner { grid-template-columns: 1fr 1fr; }
            .jd-stat:nth-child(2) { border-right: none; }
            .jd-hero-inner, .jd-body { padding-left: 1.25rem; padding-right: 1.25rem; }
        }
    </style>

    <div class="jd-root">

        {{-- HERO --}}
        <div class="jd-hero">
            <div class="jd-hero-inner">
                <a href="/jobs" class="jd-back">
                    <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    All Jobs
                </a>

                <div class="jd-category">
                    <svg width="8" height="8" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
                    {{ ucfirst($job->job_type) }}
                </div>

                <h1 class="jd-title">{{ $job->title }}</h1>

                <div class="jd-hero-meta">
                    <span class="jd-hero-meta-item">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $job->user->first_name }} {{ $job->user->last_name }}
                    </span>
                    <span class="jd-hero-meta-item">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        {{ $job->location }}
                    </span>
                    <span class="jd-hero-meta-item">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        {{ $job->created_at->diffForHumans() }}
                    </span>
                    @auth @if($canEdit)
                    <a href="/jobs/{{ $job->id }}/edit" class="jd-edit-btn">
                        <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit
                    </a>
                    @endif @endauth
                </div>
            </div>
        </div>

        {{-- STAT STRIP --}}
        <div class="jd-strip">
            <div class="jd-strip-inner">
                <div class="jd-stat">
                    <p class="jd-stat-lbl">Salary</p>
                    <p class="jd-stat-val">Rs. {{ number_format($job->salary) }}</p>
                    <p class="jd-stat-sub">per month</p>
                </div>
                <div class="jd-stat">
                    <p class="jd-stat-lbl">Location</p>
                    <p class="jd-stat-val">{{ $job->location }}</p>
                </div>
                <div class="jd-stat">
                    <p class="jd-stat-lbl">Type</p>
                    <p class="jd-stat-val">{{ ucfirst($job->job_type) }}</p>
                </div>
                <div class="jd-stat">
                    <p class="jd-stat-lbl">Experience</p>
                    <p class="jd-stat-val">{{ ucfirst($job->experience_level) }}</p>
                </div>
            </div>
        </div>

        {{-- BODY --}}
        <div class="jd-body">

            <div class="jd-main">
                <div class="jd-section">
                    <p class="jd-section-eyebrow">About the Role</p>
                    <h2 class="jd-section-title">Description</h2>
                    <div class="jd-desc trix-content">{!! $job->description !!}</div>
                </div>

                @if($job->education)
                <div class="jd-section">
                    <p class="jd-section-eyebrow">What We're Looking For</p>
                    <h2 class="jd-section-title">Requirements</h2>
                    <div class="jd-req-grid">
                        <div class="jd-req-chip">
                            <p class="jd-req-chip-lbl">Education</p>
                            <p class="jd-req-chip-val">{{ $job->education }}</p>
                        </div>
                        <div class="jd-req-chip">
                            <p class="jd-req-chip-lbl">Experience</p>
                            <p class="jd-req-chip-val">{{ ucfirst($job->experience_level) }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="jd-section">
                    <p class="jd-section-eyebrow"></p>
                    <h2 class="jd-section-title">More Information</h2>
                    <div class="jd-req-grid">
                        <div class="jd-req-chip">
                            <p class="jd-req-chip-lbl">Salary</p>
                            <p class="jd-req-chip-val">Rs. {{ number_format($job->salary) }}</p>
                        </div>
                        <div class="jd-req-chip">
                            <p class="jd-req-chip-lbl">Location</p>
                            <p class="jd-req-chip-val">{{ $job->location }}</p>
                        </div>
                    </div>
                </div>


            </div>

            <div class="jd-sidebar">
                <div class="jd-employer">
                    <div class="jd-employer-top">
                        <div class="jd-employer-avatar">
                            {{ strtoupper(substr($job->user->first_name, 0, 1)) }}{{ strtoupper(substr($job->user->last_name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="jd-employer-name">{{ $job->user->first_name }} {{ $job->user->last_name }}</p>
                            <p class="jd-employer-email">{{ $job->user->email }}</p>
                        </div>
                    </div>
                    <div class="jd-employer-body">
                        <p class="jd-employer-lbl">Hiring for</p>
                        <p class="jd-employer-val">{{ $job->title }}</p>
                    </div>
                </div>

                <div class="jd-apply-card">
                    @auth
                        @if(auth()->user()->role_type === 'employer' && auth()->id() === $job->user_id)
                            <h3 class="jd-apply-heading">Your listing</h3>
                            <p class="jd-apply-sub">Review the applications you've received.</p>
                            <a href="/jobs/{{ $job->id }}/applications" class="btn-view-apps">
                                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                View Applications
                            </a>
                        @endif
                        @if(auth()->user()->role_type === 'jobseeker')
                            @if($alreadyApplied)
                                <div class="applied-badge">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                                    Application submitted
                                </div>
                            @elseif($showApplyButton)
                                <h3 class="jd-apply-heading">Ready to apply?</h3>
                                <p class="jd-apply-sub">Take the next step in your career.</p>
                                <form method="POST" action="/jobs/{{ $job->id }}/apply">
                                    @csrf
                                    <button type="submit" class="btn-apply">
                                        Apply Now
                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth

                    @guest
                        <div class="guest-note">
                            <p>Sign in to apply for this position and track your applications.</p>
                            <a href="/login" class="btn-login">
                                Log in to Apply
                                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    @endguest

                    <p class="jd-posted">Posted {{ $job->created_at->diffForHumans() }}</p>
                </div>
            </div>

        </div>
    </div>
</x-layout>