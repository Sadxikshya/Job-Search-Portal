<x-layout>
    <x-slot:heading>Home</x-slot:heading>

    {{-- Page stylesheet — place home.css in public/css/home.css --}}
    <link rel="stylesheet" href="/css/home.css">

    {{-- ── HERO ────────────────────────────────────── --}}
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-badge">
                <span class="live-dot"></span>
                {{ number_format($stats['active_jobs']) }}+ opportunities available
            </div>

            <h1 class="display">
                Your dream job
                <span class="accent">starts here.</span>
            </h1>

            <p class="hero-sub">
                Discover opportunities at top companies and take the next step in your career journey.
            </p>

            <div class="hero-actions">
                <a href="/jobs" class="btn-solid">
                    Browse All Jobs
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="/jobs/create" class="btn-outline">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Post a Job
                </a>
            </div>

            <div class="hero-stats">
                <div>
                    <span class="hero-stat-num">{{ number_format($stats['job_seekers']) }}+</span>
                    <span class="hero-stat-lbl">Job Seekers</span>
                </div>
                <div class="stat-divider"></div>
                <div>
                    <span class="hero-stat-num">{{ number_format($stats['companies']) }}+</span>
                    <span class="hero-stat-lbl">Companies</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ── STATS BAR ───────────────────────────────── --}}
    <div class="stats-bar">
        <div class="stats-bar-inner">
            <div class="sbar-item">
                <span class="sbar-num">{{ number_format($stats['active_jobs']) }}+</span>
                <span class="sbar-lbl">Active Jobs</span>
            </div>
            <div class="sbar-item">
                <span class="sbar-num">{{ number_format($stats['companies']) }}+</span>
                <span class="sbar-lbl">Companies Hiring</span>
            </div>
            <div class="sbar-item">
                <span class="sbar-num">{{ number_format($stats['job_seekers']) }}+</span>
                <span class="sbar-lbl">Job Seekers</span>
            </div>
            <div class="sbar-item">
                <span class="sbar-num">{{ number_format($stats['successful_hires']) }}+</span>
                <span class="sbar-lbl">Successful Hires</span>
            </div>
        </div>
    </div>

    {{-- ── JOB TYPES ───────────────────────────────── --}}
    <section class="section section-frost">
        <div class="sh">
            <p class="sh-eyebrow">Browse by Type</p>
            <h2 class="display">Find the work<br>that fits your life.</h2>
            <p>Explore the arrangement that suits your schedule and goals.</p>
        </div>
        <div class="type-grid">
            <a href="/jobs?job_type=full-time" class="type-card">
                <span class="type-emoji">💼</span>
                <p class="type-name">Full-Time</p>
                <p class="type-count">{{ number_format($stats['full_time']) }}+ jobs</p>
            </a>
            <a href="/jobs?job_type=part-time" class="type-card">
                <span class="type-emoji">⏰</span>
                <p class="type-name">Part-Time</p>
                <p class="type-count">{{ number_format($stats['part_time']) }}+ jobs</p>
            </a>
            <a href="/jobs?job_type=contract" class="type-card">
                <span class="type-emoji">📝</span>
                <p class="type-name">Contract</p>
                <p class="type-count">{{ number_format($stats['contract']) }}+ jobs</p>
            </a>
            <a href="/jobs?job_type=internship" class="type-card">
                <span class="type-emoji">🎓</span>
                <p class="type-name">Internship</p>
                <p class="type-count">{{ number_format($stats['internship']) }}+ jobs</p>
            </a>
        </div>
    </section>

    {{-- ── FEATURED JOBS ───────────────────────────── --}}
    <section class="section section-white">
        <div class="jobs-header">
            <div class="sh" style="margin-bottom:0">
                <p class="sh-eyebrow">Featured</p>
                <h2 class="display">Hand-picked<br>opportunities.</h2>
            </div>
            <a href="/jobs" class="view-all-link">View all jobs →</a>
        </div>

        <div class="jobs-grid">
            @forelse ($jobs as $job)
                <article class="job-card">
                    <div class="job-top">
                        <span class="job-type-pill">{{ ucfirst($job['job_type']) }}</span>
                        {{-- <button class="job-bookmark-btn" title="Save job">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/>
                            </svg>
                        </button> --}}
                    </div>

                    <h3 class="job-title">{{ $job['title'] }}</h3>
                    <p class="job-company">
                        {{ trim(($job['user']['first_name'] ?? '') . ' ' . ($job['user']['last_name'] ?? '')) ?: 'Unknown Company' }}
                    </p>

                    <div class="job-meta">
                        <span class="job-meta-item">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            {{ $job['location'] }}
                        </span>
                    </div>

                    <div class="job-footer">
                        <p class="job-salary">Rs {{ number_format($job['salary']) }} <small>/yr</small></p>
                        <a href="/jobs/{{ $job['id'] }}" class="btn-apply">Apply Now</a>
                    </div>
                </article>
            @empty
                <p style="grid-column:1/-1; text-align:center; color:var(--ghost); padding:3rem 0;">
                    No featured jobs at the moment.
                </p>
            @endforelse
        </div>
    </section>

    {{-- ── HOW IT WORKS ────────────────────────────── --}}
    <section class="section hiw-bg">
        <div style="max-width:1100px; margin:0 auto;">
            <div class="sh" style="text-align:center; margin-bottom:2.5rem;">
                {{-- <p class="sh-eyebrow" style="color:var(--mist);">Process</p> --}}
                <h2 class="display" style="color:#fff;">How it works.</h2>
                <p style="color:rgba(255,255,255,.4); max-width:400px; margin:.75rem auto 0;">
                    Get started in three simple steps.
                </p>
            </div>

            <div class="tab-row">
                <div class="tab-wrap">
                    <button class="tab-btn active"   id="seekerTab"   onclick="switchTab('seeker')">Job Seekers</button>
                    <button class="tab-btn inactive" id="employerTab" onclick="switchTab('employer')">Employers</button>
                </div>
            </div>

            {{-- Seeker steps --}}
            <div id="seekerContent" class="hiw-grid">
                @php $seekerSteps = [
                    ['n' => '1', 'title' => 'Create Your Profile', 'body' => 'Sign up in minutes and showcase your skills, experience, and career goals with our easy profile builder.'],
                    ['n' => '2', 'title' => 'Search & Apply',      'body' => 'Browse thousands of opportunities, get personalised recommendations, and apply with one click.'],
                    ['n' => '3', 'title' => 'Get Hired',           'body' => 'Connect directly with hiring managers, track your applications, and land your dream job.'],
                ]; @endphp
                @foreach ($seekerSteps as $s)
                    <div class="hiw-card">
                        <span class="hiw-ghost-num">{{ $s['n'] }}</span>
                        <div class="hiw-step-badge">{{ $s['n'] }}</div>
                        <h3 class="hiw-title">{{ $s['title'] }}</h3>
                        <p class="hiw-body">{{ $s['body'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Employer steps --}}
            <div id="employerContent" class="hiw-grid" style="display:none;">
                @php $employerSteps = [
                    ['n' => '1', 'title' => 'Post Your Job',      'body' => 'Create detailed job listings that attract qualified candidates. Include salary, benefits, and requirements.'],
                    ['n' => '2', 'title' => 'Review Candidates',  'body' => 'Access qualified candidates, review profiles and resumes, and use our filtering tools to find the best fit.'],
                    ['n' => '3', 'title' => 'Hire Top Talent',    'body' => 'Schedule interviews, communicate directly with candidates, and build your dream team faster.'],
                ]; @endphp
                @foreach ($employerSteps as $s)
                    <div class="hiw-card">
                        <span class="hiw-ghost-num">{{ $s['n'] }}</span>
                        <div class="hiw-step-badge">{{ $s['n'] }}</div>
                        <h3 class="hiw-title">{{ $s['title'] }}</h3>
                        <p class="hiw-body">{{ $s['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            function switchTab(tab) {
                var s    = document.getElementById('seekerContent');
                var e    = document.getElementById('employerContent');
                var sBtn = document.getElementById('seekerTab');
                var eBtn = document.getElementById('employerTab');
                if (tab === 'seeker') {
                    s.style.display = ''; e.style.display = 'none';
                    sBtn.className = 'tab-btn active'; eBtn.className = 'tab-btn inactive';
                } else {
                    e.style.display = ''; s.style.display = 'none';
                    eBtn.className = 'tab-btn active'; sBtn.className = 'tab-btn inactive';
                }
            }
        </script>
    </section>

    {{-- ── TESTIMONIALS ────────────────────────────── --}}
    <section class="section section-frost">
        <div class="sh">
            <p class="sh-eyebrow">Stories</p>
            <h2 class="display">Success stories.</h2>
            <p>See what our users have to say.</p>
        </div>

        <div class="testi-grid">
            <div class="testi-card">
                <div class="stars">@for($i=0;$i<5;$i++)<span class="star">★</span>@endfor</div>
                <p class="quote">"Found my dream job within 2 weeks of signing up. The platform is intuitive and the job matching is spot-on. Couldn't be happier!"</p>
                <div class="author">
                    <div class="avatar" style="background:var(--pool);">SJ</div>
                    <div>
                        <p class="author-name">Sarah Johnson</p>
                        <p class="author-role">Software Engineer at TechCorp</p>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="stars">@for($i=0;$i<5;$i++)<span class="star">★</span>@endfor</div>
                <p class="quote">"The job recommendations were incredibly accurate. I received opportunities that perfectly matched my skills and career goals. Highly recommend!"</p>
                <div class="author">
                    <div class="avatar" style="background:#8ab4d4;">MC</div>
                    <div>
                        <p class="author-name">Michael Chen</p>
                        <p class="author-role">Product Manager at StartupCo</p>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="stars">@for($i=0;$i<5;$i++)<span class="star">★</span>@endfor</div>
                <p class="quote">"Transitioning careers felt impossible until I found this platform. I landed a tech role within a month. The resources and support were invaluable."</p>
                <div class="author">
                    <div class="avatar" style="background:#6db8c4;">DP</div>
                    <div>
                        <p class="author-name">David Park</p>
                        <p class="author-role">Data Analyst at Analytics Pro</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── TRUST BAR ───────────────────────────────── --}}
    <div class="trust-bar">
        <p class="trust-label">Trusted by leading companies</p>
        <div class="trust-logos">
            <a href="https://hamrobazaar.com/"  class="trust-logo">Hamro Bazar</a>
            <a href="https://f1soft.com/"       class="trust-logo">F1soft</a>
            <a href="https://esewatravels.com/" class="trust-logo">Esewa Tour &amp; Travels</a>
        </div>
    </div>

    {{-- ── FINAL CTA ───────────────────────────────── --}}
    <section class="cta-section">
        <div class="cta-inner">
            <div class="cta-text">
                <h2 class="display">Ready to take<br>the next step?</h2>
                <p>Join thousands of professionals who found their dream job through our platform.</p>
            </div>
            <div class="cta-btns">
                <a href="/register" class="btn-solid">Create Free Account</a>
                <a href="/jobs"     class="btn-outline">Browse All Jobs</a>
            </div>
        </div>
    </section>

</x-layout>