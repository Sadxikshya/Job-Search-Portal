<x-layout>
    <x-slot:heading>Job Applicants</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .apps-wrap {
            max-width: 860px;
            margin: 0 auto;
            padding: 2rem 1.5rem 3rem;
        }

        /* ── Header ── */
        .apps-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
        }

        .apps-back {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            font-size: .78rem;
            font-weight: 600;
            color: var(--ghost);
            text-decoration: none;
            margin-bottom: .6rem;
            transition: color .15s;
        }
        .apps-back:hover { color: var(--pool); }

        .apps-eyebrow {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .25rem;
        }

        .apps-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.7rem;
            color: var(--ink);
            line-height: 1.15;
        }

        .apps-count-pill {
            display: inline-flex;
            align-items: baseline;
            gap: .4rem;
            background: var(--sky);
            border: 1px solid var(--mist);
            border-radius: 10px;
            padding: .6rem 1rem;
            flex-shrink: 0;
            margin-top: .25rem;
        }

        .apps-count-num {
            font-family: 'DM Serif Display', serif;
            font-size: 1.6rem;
            color: var(--pool);
            line-height: 1;
        }

        .apps-count-lbl {
            font-size: .68rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--ghost);
        }

        /* ── Applicant card ── */
        .app-card {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 13px;
            padding: 1.1rem 1.3rem;
            margin-bottom: .85rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: border-color .2s, box-shadow .2s;
        }
        .app-card:hover {
            border-color: var(--mist);
            box-shadow: 0 3px 16px rgba(123,191,212,.1);
        }

        .app-avatar-img {
            width: 46px; height: 46px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--mist);
            flex-shrink: 0;
        }

        .app-avatar-initials {
            width: 46px; height: 46px;
            border-radius: 50%;
            background: var(--sky);
            border: 2px solid var(--mist);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--deep);
            flex-shrink: 0;
        }

        .app-info { flex: 1; min-width: 0; }

        .app-name {
            font-size: .92rem;
            font-weight: 600;
            color: var(--ink);
        }

        .app-email {
            font-size: .75rem;
            color: var(--ghost);
            margin-top: .1rem;
            margin-bottom: .45rem;
        }

        .app-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: .4rem;
        }

        .app-badge {
            display: inline-flex;
            align-items: center;
            padding: .18rem .6rem;
            border-radius: 999px;
            font-size: .68rem;
            font-weight: 600;
            background: var(--sky);
            border: 1px solid var(--mist);
            color: var(--deep);
        }

        .app-time {
            font-size: .69rem;
            color: var(--ghost);
        }

        .app-status {
            display: inline-flex;
            align-items: center;
            padding: .18rem .6rem;
            border-radius: 999px;
            font-size: .68rem;
            font-weight: 700;
        }
        .app-status.reviewing { background: #fef3c7; color: #92400e; }
        .app-status.accepted  { background: #d1fae5; color: #065f46; }
        .app-status.rejected  { background: #fee2e2; color: #991b1b; }

        /* Actions */
        .app-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-shrink: 0;
        }

        .view-profile-btn {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .42rem .85rem;
            border-radius: 8px;
            font-size: .77rem;
            font-weight: 600;
            color: var(--deep);
            background: var(--sky);
            border: 1.5px solid var(--mist);
            text-decoration: none;
            white-space: nowrap;
            transition: background .15s, border-color .15s;
        }
        .view-profile-btn:hover { background: var(--mist); border-color: var(--pool); }

        .no-profile-tag {
            display: inline-flex;
            align-items: center;
            padding: .42rem .85rem;
            border-radius: 8px;
            font-size: .77rem;
            color: var(--ghost);
            background: var(--frost);
            border: 1.5px solid var(--border);
        }

        .status-select {
            appearance: none;
            background: var(--frost) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='none' viewBox='0 0 10 6'%3E%3Cpath stroke='%238b9aab' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' d='M1 1l4 4 4-4'/%3E%3C/svg%3E") no-repeat right .65rem center;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: .42rem 2rem .42rem .75rem;
            font-size: .77rem;
            font-weight: 500;
            color: var(--body);
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: border-color .15s;
        }
        .status-select:hover,
        .status-select:focus { outline: none; border-color: var(--pool); }

        /* Empty */
        .app-empty {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 13px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 3.5rem 2rem;
        }
        .app-empty svg { color: #d1d5db; margin-bottom: .85rem; }
        .app-empty h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem;
            color: var(--ink);
            margin-bottom: .4rem;
        }
        .app-empty p { font-size: .84rem; color: var(--ghost); max-width: 300px; line-height: 1.65; margin-bottom: 1rem; }

        @media (max-width: 640px) {
            .app-card { flex-wrap: wrap; }
            .app-actions { width: 100%; justify-content: flex-end; }
            .apps-count-pill { display: none; }
        }
    </style>

    <div class="apps-wrap">

        {{-- Header --}}
        <div class="apps-header">
            <div>
                <a href="/jobs/{{ $job->id }}" class="apps-back">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Job
                </a>
                <p class="apps-eyebrow">Applicants</p>
                <h1 class="apps-title">{{ $job->title }}</h1>
            </div>
            <div class="apps-count-pill">
                <span class="apps-count-num">{{ $applications->count() }}</span>
                <span class="apps-count-lbl">{{ Str::plural('Applicant', $applications->count()) }}</span>
            </div>
        </div>

        {{-- Cards --}}
        @forelse ($applications as $application)
        <div class="app-card">

            {{-- Avatar --}}
            @if($application->user->jobseekerProfile && $application->user->jobseekerProfile->profile_image)
                <img src="{{ asset('profile-images/' . $application->user->jobseekerProfile->profile_image) }}"
                     alt="Profile" class="app-avatar-img"/>
            @else
                <div class="app-avatar-initials">
                    {{ strtoupper(substr($application->user->first_name, 0, 1)) }}{{ strtoupper(substr($application->user->last_name, 0, 1)) }}
                </div>
            @endif

            {{-- Info --}}
            <div class="app-info">
                <p class="app-name">{{ $application->user->first_name }} {{ $application->user->last_name }}</p>
                <p class="app-email">{{ $application->user->email }}</p>
                <div class="app-meta">
                    @if($application->user->jobseekerProfile)
                        @if($application->user->jobseekerProfile->experience_level)
                            <span class="app-badge">{{ ucfirst($application->user->jobseekerProfile->experience_level) }} </span>
                        @endif
                        @if($application->user->jobseekerProfile->education)
                            <span class="app-badge">{{ $application->user->jobseekerProfile->education }}</span>
                        @endif
                    @endif
                    <span class="app-time">{{ $application->created_at->diffForHumans() }}</span>
                    @php $status = strtolower($application->status ?? 'reviewing'); @endphp
                    <span class="app-status {{ $status }}">{{ ucfirst($status) }}</span>
                </div>
            </div>

            {{-- Actions --}}
            <div class="app-actions">
                @if($application->user->jobseekerProfile)
                    <a href="{{ route('jobseeker.show', $application->user) }}" class="view-profile-btn">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        View Profile
                    </a>
                @else
                    <span class="no-profile-tag">No Profile</span>
                @endif

                <form method="POST" action="/applications/{{ $application->id }}/status">
                    @csrf
                    @method('PATCH')
                    <select name="status" onchange="this.form.submit()" class="status-select">
                        <option value="reviewing" @selected($application->status === 'reviewing')>Reviewing</option>
                        <option value="accepted"  @selected($application->status === 'accepted')>Accepted</option>
                        <option value="rejected"  @selected($application->status === 'rejected')>Rejected</option>
                    </select>
                </form>
            </div>

        </div>
        @empty
        <div class="app-empty">
            <svg width="44" height="44" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <h3>No applicants yet</h3>
            <p>When job seekers apply for this position, they'll appear here.</p>
            <a href="/jobs" class="view-all">View all jobs →</a>
        </div>
        @endforelse

    </div>
</x-layout>