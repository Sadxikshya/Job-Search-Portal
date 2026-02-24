<x-layout>
    <x-slot:heading>Jobs Listing</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/jobs.css">

    <div class="jobs-page">

        {{-- ── MASTHEAD ── --}}
        <div class="jobs-masthead">
            <div class="masthead-inner">
                <p class="masthead-kicker">CareerHub</p>
                <h1 class="masthead-title">Find your next opportunity</h1>
                <p class="masthead-subtitle">Browse open positions and take the next step in your career.</p>
                <span class="masthead-count">{{ $jobs->total() }} {{ Str::plural('position', $jobs->total()) }} available</span>
            </div>
        </div>

        {{-- ── FILTER STRIP ── --}}
        <div class="jobs-filter-strip">
            <div class="filter-strip-inner">
                <a href="/jobs" class="filter-chip {{ !request()->hasAny(['search','location','job_type','salary_min','salary_max','experience_level']) ? 'active' : '' }}">All</a>
                @foreach(['full-time','part-time','contract','internship'] as $type)
                    <a href="/jobs?job_type={{ $type }}" class="filter-chip {{ request('job_type') === $type ? 'active' : '' }}">{{ ucfirst($type) }}</a>
                @endforeach

                <button class="filter-toggle" onclick="toggleFilters()" id="filterToggleBtn">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filters
                    @if(request()->hasAny(['search','location','salary_min','salary_max','experience_level']))
                        <span style="width:7px;height:7px;border-radius:50%;background:var(--pool);display:inline-block;"></span>
                    @endif
                </button>
            </div>
        </div>

        {{-- ── FILTER PANEL ── --}}
        <div class="filter-panel {{ request()->hasAny(['search','location','salary_min','salary_max','experience_level']) ? 'open' : '' }}" id="filterPanel">
            <form method="GET" action="/jobs">
                <div class="filter-panel-inner">
                    <div class="filter-group">
                        <label>Job Title</label>
                        <input class="filter-input" type="text" name="search" value="{{ request('search') }}" placeholder="Search titles…"/>
                    </div>
                    <div class="filter-group">
                        <label>Location</label>
                        <input class="filter-input" type="text" name="location" value="{{ request('location') }}" placeholder="City or area…"/>
                    </div>
                    <div class="filter-group">
                        <label>Job Type</label>
                        <select class="filter-select" name="job_type">
                            <option value="">Any type</option>
                            @foreach(['full-time','part-time','contract','internship'] as $type)
                                <option value="{{ $type }}" @selected(request('job_type') === $type)>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Min Salary</label>
                        <input class="filter-input" type="number" name="salary_min" value="{{ request('salary_min') }}" placeholder="Rs. 0"/>
                    </div>
                    <div class="filter-group">
                        <label>Max Salary</label>
                        <input class="filter-input" type="number" name="salary_max" value="{{ request('salary_max') }}" placeholder="Rs. any"/>
                    </div>
                    <div class="filter-group">
                        <label>Experience</label>
                        <select class="filter-select" name="experience_level">
                            <option value="">Any level</option>
                            @foreach(['entry','junior','mid','senior'] as $level)
                                <option value="{{ $level }}" @selected(request('experience_level') === $level)>{{ ucfirst($level) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group" style="display:flex;align-items:flex-end;gap:.5rem;">
                        <button type="submit" class="filter-apply-btn">Apply</button>
                        <a href="/jobs" class="filter-reset-btn">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        {{-- ── JOBS SECTION ── --}}
        <div class="jobs-section">

            <div class="jobs-section-header">
                <p class="jobs-section-lbl">
                    {{ $jobs->total() }} {{ Str::plural('result', $jobs->total()) }}
                    @if(request('search')) for "<strong>{{ request('search') }}</strong>" @endif
                </p>
                @auth
                    @if(auth()->user()->isEmployer())
                        <a href="/jobs/create" class="jobs-post-btn">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v16m8-8H4"/></svg>
                            Post a Job
                        </a>
                    @endif
                @endauth
            </div>

            <div class="jobs-grid">

                @forelse($jobs as $job)
                <div class="jc">
                    <div class="jc-top">
                        <span class="jc-type">{{ ucfirst($job->job_type) }}</span>
                        @auth
                            @if(auth()->id() === $job->user_id)
                            <div class="jc-actions">
                                <a href="/jobs/{{ $job->id }}/edit" class="jc-act" title="Edit">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Delete this job?')" style="display:contents;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="jc-act del" title="Delete">
                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endauth
                    </div>

                    <a href="/jobs/{{ $job->id }}" class="jc-title">{{ $job->title }}</a>
                    <p class="jc-employer">{{ $job->user->first_name }} {{ $job->user->last_name }}</p>

                    <div class="jc-meta">
                        <span class="jc-meta-item">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $job->location }}
                        </span>
                        @if($job->experience_level)
                        <span class="jc-meta-item">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            {{ ucfirst($job->experience_level) }}
                        </span>
                        @endif
                    </div>

                    <div class="jc-footer">
                        <div class="jc-salary">
                            Rs. {{ number_format($job->salary) }}
                            <small>/mo</small>
                        </div>
                        <a href="/jobs/{{ $job->id }}" class="jc-view-btn">
                            View Job
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="jobs-empty">
                    <svg class="jobs-empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <h3 class="jobs-empty-title">No jobs found</h3>
                    <p class="jobs-empty-sub">Try adjusting your filters or check back later.</p>
                    <a href="/jobs" class="jc-view-btn" style="display:inline-flex;width:auto;">Clear filters</a>
                </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            @if($jobs->hasPages())
            <div class="jobs-pagination">
                {{ $jobs->onEachSide(1)->links('pagination::simple-bootstrap-4') }}
            </div>
            @endif

        </div>
    </div>

    <script>
        function toggleFilters() {
            const panel = document.getElementById('filterPanel');
            panel.classList.toggle('open');
        }
    </script>

</x-layout>