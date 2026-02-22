<x-layout>
    <x-slot:heading>Jobseeker Profile</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .js-page {
            max-width: 720px;
            margin: 0 auto;
            padding: 2rem 1.5rem 4rem;
        }

        /* ── Back ── */
        .js-back {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            font-size: .77rem;
            font-weight: 600;
            color: var(--ghost);
            text-decoration: none;
            margin-bottom: 1.25rem;
            transition: color .15s;
        }
        .js-back:hover { color: var(--pool); }

        /* ─────────────────────────────
           HEADER BANNER
        ───────────────────────────── */
        .js-banner {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 1px; /* flush join with next card */
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .js-banner-cover {
            height: 90px;
            background: linear-gradient(130deg, var(--sky) 0%, var(--mist) 100%);
            position: relative;
        }

        .js-banner-body {
            padding: 0 1.5rem 1.3rem;
            position: relative;
        }

        .js-avatar-wrap {
            position: absolute;
            top: -34px;
            left: 1.5rem;
        }

        .js-avatar-img,
        .js-avatar-initials {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }

        .js-avatar-img { object-fit: cover; }

        .js-avatar-initials {
            background: var(--sky);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Serif Display', serif;
            font-size: 1.4rem;
            color: var(--deep);
        }

        .js-banner-name-row {
            padding-top: 42px; /* clears avatar */
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .js-name {
            font-family: 'DM Serif Display', serif;
            font-size: 1.45rem;
            color: var(--ink);
            line-height: 1.15;
            margin-bottom: .2rem;
        }

        .js-headline {
            font-size: .87rem;
            color: var(--ghost);
            margin-bottom: .65rem;
        }

        .js-meta-pills {
            display: flex;
            flex-wrap: wrap;
            gap: .4rem;
        }

        .js-pill {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            padding: .22rem .7rem;
            border-radius: 999px;
            font-size: .71rem;
            font-weight: 600;
            background: var(--sky);
            border: 1px solid var(--mist);
            color: var(--deep);
        }

        /* Download CV button in header */
        .js-header-btn {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .48rem 1rem;
            border-radius: 8px;
            font-size: .78rem;
            font-weight: 600;
            background: var(--pool);
            color: #fff;
            text-decoration: none;
            border: none;
            white-space: nowrap;
            flex-shrink: 0;
            box-shadow: 0 2px 10px rgba(123,191,212,.22);
            transition: background .15s, transform .15s;
            margin-top: 42px;
        }
        .js-header-btn:hover { background: var(--deep); transform: translateY(-1px); }

        /* ─────────────────────────────
           SECTIONS  (flush card stack)
        ───────────────────────────── */
        .js-section {
            background: #fff;
            border: 1.5px solid var(--border);
            border-top: none;
            padding: 1.25rem 1.5rem;
        }

        /* last section gets rounded bottom */
        .js-section:last-child {
            border-bottom-left-radius: 14px;
            border-bottom-right-radius: 14px;
            margin-bottom: 0;
        }

        .js-section-sep {
            border: none;
            border-top: 1px solid var(--border);
            margin: 0;
        }

        .js-section-label {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .75rem;
        }

        /* Contact row */
        .js-contact-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem 2rem;
        }

        .js-contact-item {
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .js-contact-ico {
            width: 30px; height: 30px;
            border-radius: 7px;
            background: var(--sky);
            border: 1px solid var(--mist);
            display: flex; align-items: center; justify-content: center;
            color: var(--pool);
            flex-shrink: 0;
        }

        .js-contact-lbl {
            font-size: .63rem;
            font-weight: 700;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--ghost);
            margin-bottom: .1rem;
        }

        .js-contact-val {
            font-size: .85rem;
            color: var(--ink);
            font-weight: 500;
        }

        /* Bio */
        .js-bio {
            font-size: .88rem;
            color: var(--body);
            line-height: 1.85;
        }

        /* Skills */
        .js-skills {
            display: flex;
            flex-wrap: wrap;
            gap: .45rem;
        }

        .js-skill {
            display: inline-flex;
            align-items: center;
            padding: .28rem .8rem;
            border-radius: 999px;
            background: var(--frost);
            border: 1.5px solid var(--border);
            font-size: .76rem;
            font-weight: 500;
            color: var(--body);
            cursor: default;
            transition: border-color .15s, color .15s, background .15s;
        }
        .js-skill:hover { border-color: var(--pool); color: var(--deep); background: var(--sky); }

        /* Documents */
        .js-file-row {
            display: flex;
            align-items: center;
            gap: .85rem;
            padding: .8rem 1rem;
            background: var(--frost);
            border: 1.5px solid var(--border);
            border-radius: 10px;
        }
        .js-file-row + .js-file-row { margin-top: .6rem; }

        .js-file-ico {
            width: 34px; height: 34px;
            border-radius: 7px;
            background: #fff;
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .js-file-name {
            font-size: .84rem;
            font-weight: 600;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .js-file-sub {
            font-size: .7rem;
            color: var(--ghost);
            margin-top: 1px;
        }

        .js-dl {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .38rem .85rem;
            border-radius: 7px;
            font-size: .75rem;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            flex-shrink: 0;
            border: 1.5px solid var(--mist);
            background: var(--sky);
            color: var(--deep);
            transition: background .15s, border-color .15s;
        }
        .js-dl:hover { background: var(--mist); border-color: var(--pool); }

        .js-dl-primary {
            background: var(--pool);
            color: #fff;
            border-color: var(--pool);
            box-shadow: 0 2px 8px rgba(123,191,212,.2);
        }
        .js-dl-primary:hover { background: var(--deep); border-color: var(--deep); }

        @media (max-width: 540px) {
            .js-banner-name-row { flex-direction: column; }
            .js-header-btn { margin-top: 0; width: 100%; justify-content: center; }
            .js-contact-row { gap: .9rem; }
        }
    </style>

    <div class="js-page">

        {{-- Back --}}
        <a href="javascript:history.back()" class="js-back">
            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back
        </a>

        {{-- ── HEADER BANNER ── --}}
        <div class="js-banner">
            <div class="js-banner-cover"></div>
            <div class="js-banner-body">
                <div class="js-avatar-wrap">
                    @if($user->jobseekerProfile && $user->jobseekerProfile->profile_image)
                        <img src="{{ asset('profile-images/' . $user->jobseekerProfile->profile_image) }}"
                             alt="Profile" class="js-avatar-img"/>
                    @else
                        <div class="js-avatar-initials">
                            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div class="js-banner-name-row">
                    <div>
                        <h1 class="js-name">{{ $user->first_name }} {{ $user->last_name }}</h1>
                        <p class="js-headline">{{ $profile->education }}</p>
                        <div class="js-meta-pills">
                            <span class="js-pill">
                                <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                {{ ucfirst($profile->experience_level) }} Level
                            </span>
                            <span class="js-pill">
                                <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $profile->address }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('jobseeker.cv.download', $user) }}" class="js-header-btn">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download CV
                    </a>
                </div>
            </div>
        </div>

        {{-- ── CONTACT ── --}}
        <hr class="js-section-sep">
        <div class="js-section">
            <p class="js-section-label">Contact</p>
            <div class="js-contact-row">
                <div class="js-contact-item">
                    <div class="js-contact-ico">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="js-contact-lbl">Email</p>
                        <p class="js-contact-val">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="js-contact-item">
                    <div class="js-contact-ico">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    </div>
                    <div>
                        <p class="js-contact-lbl">Phone</p>
                        <p class="js-contact-val">{{ $profile->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── ABOUT ── --}}
        @if($user->jobseekerProfile->bio)
        <hr class="js-section-sep">
        <div class="js-section">
            <p class="js-section-label">About</p>
            <div class="js-bio trix-content">{!! $user->jobseekerProfile->bio !!}</div>
        </div>
        @endif

        {{-- ── SKILLS ── --}}
        @if($profile->skills)
        <hr class="js-section-sep">
        <div class="js-section">
            <p class="js-section-label">Skills &amp; Expertise</p>
            <div class="js-skills">
                @foreach(explode(',', $profile->skills) as $skill)
                    <span class="js-skill">{{ trim($skill) }}</span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── DOCUMENTS ── --}}
        @if($profile->resume)
        <hr class="js-section-sep">
        <div class="js-section">
            <p class="js-section-label">Documents</p>

            <div class="js-file-row">
                <div class="js-file-ico">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:#e53e3e"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div style="flex:1;min-width:0;">
                    <p class="js-file-name">{{ basename($profile->resume) }}</p>
                    <p class="js-file-sub">PDF · Resume</p>
                </div>
                <a href="{{ Storage::url($profile->resume) }}" target="_blank" download class="js-dl">
                    <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download
                </a>
            </div>

            <div class="js-file-row">
                <div class="js-file-ico">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--pool)"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div style="flex:1;min-width:0;">
                    <p class="js-file-name">{{ $user->first_name }} {{ $user->last_name }}'s CV</p>
                    <p class="js-file-sub">PDF · Generated CV</p>
                </div>
                <a href="{{ route('jobseeker.cv.download', $user) }}" class="js-dl js-dl-primary">
                    <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download CV
                </a>
            </div>
        </div>
        @endif

    </div>
</x-layout>