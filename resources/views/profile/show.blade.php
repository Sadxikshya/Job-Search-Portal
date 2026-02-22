<x-layout>
    <x-slot:heading>My Profile</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">

    <div class="profile-shell">

        {{-- ══════════════════
             SIDEBAR
        ══════════════════ --}}
        <aside class="profile-sidebar">

            {{-- Avatar --}}
            @if($user->jobseekerProfile && $user->jobseekerProfile->profile_image)
                <img src="{{ asset('profile-images/' . $user->jobseekerProfile->profile_image) }}"
                     alt="Profile" class="sidebar-avatar-img"/>
            @else
                <div class="sidebar-avatar-initials">
                    {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                </div>
            @endif

            <p class="sidebar-name">{{ $user->first_name }} {{ $user->last_name }}</p>
            <p class="sidebar-email">{{ $user->email }}</p>
            <span class="sidebar-role-pill">{{ $user->isEmployer() ? '👔 Employer' : '💼 Job Seeker' }}</span>

            @if($user->isEmployer())
            <div class="sidebar-stat">
                <span class="sidebar-stat-num">{{ $jobs->count() }}</span>
                <span class="sidebar-stat-lbl">Jobs Posted</span>
            </div>
            @endif

            <div class="sidebar-sep"></div>

            {{-- Nav --}}
            <nav class="sidebar-nav">
                @if(!$user->isEmployer())
                <a href="{{ route('jobseeker.profile.edit') }}" class="sidebar-link active">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    {{ Auth::user()->hasCompletedProfile() ? 'Edit Profile' : 'Complete Profile' }}
                </a>
                @endif

                <a href="{{ route('profile.edit') }}" class="sidebar-link">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/></svg>
                    Account Settings
                </a>

                <a href="/jobs" class="sidebar-link">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Browse Jobs
                </a>
            </nav>

            {{-- Footer actions --}}
            <div class="sidebar-footer">
                @if(!$user->isEmployer() && $user->jobseekerProfile)
                    <a href="{{ route('jobseeker.cv.download', $user) }}" class="btn-sm btn-sm-ghost">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download CV
                    </a>
                @endif
                {{-- @if($user->isEmployer())
                    <a href="/jobs/create" class="btn-sm btn-sm-solid">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Post a Job
                    </a>
                @endif --}}
            </div>

        </aside>

        {{-- ══════════════════
             MAIN
        ══════════════════ --}}
        <main class="profile-main">

            {{-- ── JOBSEEKER PROFILE ── --}}
            @if(!$user->isEmployer() && $user->jobseekerProfile)

                <p class="pm-eyebrow">Overview</p>
                <h1 class="pm-title">Professional Profile</h1>

                {{-- Contact + Experience --}}
                <div class="pcard">
                    <div class="pcard-header">
                        <span class="pcard-title">Details</span>
                    </div>
                    <div class="pcard-body">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="detail-ico">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                                </div>
                                <div>
                                    <p class="detail-lbl">Phone</p>
                                    <p class="detail-val">{{ $user->jobseekerProfile->phone }}</p>
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-ico">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                </div>
                                <div>
                                    <p class="detail-lbl">Address</p>
                                    <p class="detail-val">{{ $user->jobseekerProfile->address }}</p>
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-ico">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                                </div>
                                <div>
                                    <p class="detail-lbl">Education</p>
                                    <p class="detail-val">{{ $user->jobseekerProfile->education }}</p>
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-ico">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                </div>
                                <div>
                                    <p class="detail-lbl">Experience</p>
                                    <span class="exp-badge">{{ ucfirst($user->jobseekerProfile->experience_level) }}</span>
                                </div>
                            </div>
                        </div>

                        @if($user->jobseekerProfile->skills)
                        <div class="pcard-sep"></div>
                        <p class="detail-lbl" style="margin-bottom:.65rem;">Skills</p>
                        <div class="skills-wrap">
                            @foreach(explode(',', $user->jobseekerProfile->skills) as $skill)
                                <span class="skill-pill">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                        @endif

                        @if($user->jobseekerProfile->bio)
                        <div class="pcard-sep"></div>
                        <p class="detail-lbl" style="margin-bottom:.55rem;">About Me</p>
                        <div class="bio-text trix-content">{!! $user->jobseekerProfile->bio !!}</div>
                        @endif

                        @if($user->jobseekerProfile->resume)
                        <div class="pcard-sep"></div>
                        <p class="detail-lbl" style="margin-bottom:.65rem;">Resume</p>
                        <div class="resume-row">
                            <div class="resume-ico">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="resume-name-wrap" style="flex:1;min-width:0;">
                                <p class="resume-name">{{ basename($user->jobseekerProfile->resume) }}</p>
                                <p class="resume-type">PDF Document</p>
                            </div>
                            <a href="{{ Storage::url($user->jobseekerProfile->resume) }}" target="_blank" class="btn-sm btn-sm-solid">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

            @elseif(!$user->isEmployer() && !$user->jobseekerProfile)

                <p class="pm-eyebrow">Get Started</p>
                <h1 class="pm-title">My Profile</h1>

                <div class="pcard">
                    <div class="pcard-empty">
                        <svg width="44" height="44" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <h3>Complete Your Profile</h3>
                        <p>Add your professional details, skills, and resume to stand out to employers.</p>
                        <a href="{{ route('jobseeker.profile.edit') }}" class="btn-sm btn-sm-solid">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Complete Profile Now
                        </a>
                    </div>
                </div>

            @endif

            {{-- ── EMPLOYER JOBS ── --}}
            @if($user->isEmployer())

                <p class="pm-eyebrow">Manage</p>
                <h1 class="pm-title">My Job Listings</h1>

                <div class="pcard">
                    <div class="pcard-header">
                        <span class="pcard-title">Posted Jobs</span>
                        <a href="/jobs/create" class="btn-sm btn-sm-solid">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            New Job
                        </a>
                    </div>
                    <div class="table-scroll">
                        <table class="ptable">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Salary</th>
                                    <th>Location</th>
                                    <th style="text-align:center;">Applicants</th>
                                    <th style="text-align:right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $job)
                                <tr>
                                    <td>
                                        <p class="t-title">{{ $job->title }}</p>
                                        <p class="t-sub">{{ ucfirst($job->job_type) }}</p>
                                    </td>
                                    <td><span class="salary-val">Rs.{{ number_format($job->salary) }}</span></td>
                                    <td class="t-muted">{{ $job->location }}</td>
                                    <td style="text-align:center;">
                                        <a href="/jobs/{{ $job->id }}/applications" class="app-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            {{ $job->applications_count }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="act-group">
                                            <a href="/jobs/{{ $job->id }}" class="act-btn act-view" title="View">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                            <a href="/jobs/{{ $job->id }}/edit" class="act-btn act-edit" title="Edit">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </a>
                                            <form method="POST" action="/jobs/{{ $job->id }}" onsubmit="return confirm('Delete this job?')" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="act-btn act-del" title="Delete">
                                                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="t-empty">
                                        <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        <p>No jobs posted yet.</p>
                                        <a href="/jobs/create" class="view-all">Post your first job →</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            @endif

            {{-- ── JOBSEEKER APPLICATIONS ── --}}
            @if(!$user->isEmployer())

                <div class="pcard">
                    <div class="pcard-header">
                        <span class="pcard-title">My Applications</span>
                        <a href="/jobs" class="view-all">Browse jobs →</a>
                    </div>
                    <div class="table-scroll">
                        <table class="ptable">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Posted By</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th style="text-align:right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appliedJobs as $job)
                                <tr>
                                    <td>
                                        <p class="t-title">{{ $job->title }}</p>
                                        <p class="t-sub">{{ $job->location }}</p>
                                    </td>
                                    <td class="t-muted">{{ $job->user->first_name }} {{ $job->user->last_name }}</td>
                                    <td><span class="salary-val">Rs.{{ number_format($job->salary) }}</span></td>
                                    <td>
                                        @php $status = $job->pivot->status; @endphp
                                        <span class="status-pill status-{{ $status }}">{{ ucfirst($status) }}</span>
                                    </td>
                                    <td style="text-align:right;">
                                        <a href="/jobs/{{ $job->id }}" class="view-link">
                                            View
                                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="t-empty">
                                        <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <p>No applications yet.</p>
                                        <a href="/jobs" class="view-all">Browse available jobs →</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            @endif

        </main>

    </div>{{-- /.profile-shell --}}
</x-layout>