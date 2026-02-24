<x-layout>
    <x-slot:heading>Complete Your Profile</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .jf-page {
            max-width: 780px;
            margin: 0 auto;
            padding: 3rem 2rem 5rem;
        }

        .jf-header {
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border);
        }

        .jf-eyebrow {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .4rem;
        }

        .jf-title {
            font-family: 'DM Serif Display', serif;
            font-size: 2rem;
            color: var(--ink);
            line-height: 1.1;
            margin-bottom: .5rem;
        }

        .jf-subtitle { font-size: .9rem; color: var(--ghost); }

        /* Success banner */
        .alert-success {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .9rem 1.1rem;
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            border-radius: 10px;
            margin-bottom: 2rem;
            font-size: .84rem;
            color: #065f46;
            font-weight: 500;
        }

        /* Fields */
        .jf-field {
            display: flex;
            flex-direction: column;
            gap: .5rem;
            margin-bottom: 2rem;
        }

        .jf-label {
            font-size: .8rem;
            font-weight: 700;
            color: var(--ink);
        }

        .jf-hint {
            font-size: .75rem;
            color: var(--ghost);
            margin-top: -.25rem;
        }

        .jf-col2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.75rem;
        }

        .jf-input,
        .jf-select,
        .jf-textarea {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .78rem 1rem;
            font-size: .9rem;
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
            width: 100%;
            box-sizing: border-box;
        }

        .jf-input::placeholder,
        .jf-textarea::placeholder { color: #b8c4cc; }

        .jf-input:focus,
        .jf-select:focus,
        .jf-textarea:focus {
            border-color: var(--pool);
            box-shadow: 0 0 0 4px rgba(123,191,212,.13);
        }

        .jf-textarea { resize: vertical; min-height: 80px; line-height: 1.6; }

        .jf-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='none' viewBox='0 0 10 6'%3E%3Cpath stroke='%238b9aab' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' d='M1 1l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
            background-color: #fff;
        }

        .jf-error { font-size: .74rem; color: #b91c1c; margin-top: -.2rem; }

        /* File upload */
        .jf-file {
            border: 1.5px dashed var(--border);
            border-radius: 10px;
            padding: 1rem 1.1rem;
            background: var(--frost);
            cursor: pointer;
            transition: border-color .15s;
        }

        .jf-file:hover { border-color: var(--pool); }

        .jf-file input[type="file"] {
            width: 100%;
            font-size: .84rem;
            color: var(--body);
            font-family: 'DM Sans', sans-serif;
        }

        .jf-file input[type="file"]::file-selector-button {
            padding: .35rem .85rem;
            border-radius: 7px;
            border: 1.5px solid var(--mist);
            background: var(--sky);
            color: var(--deep);
            font-size: .78rem;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            margin-right: .75rem;
            transition: background .15s;
        }

        .jf-file input[type="file"]::file-selector-button:hover {
            background: var(--mist);
        }

        /* Current file row */
        .current-file {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .75rem 1rem;
            background: var(--frost);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            margin-bottom: .75rem;
        }

        .current-file-ico {
            width: 32px; height: 32px;
            border-radius: 7px;
            background: #fff;
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .current-file-name { font-size: .84rem; font-weight: 600; color: var(--ink); flex: 1; }
        .current-file-sub  { font-size: .7rem; color: var(--ghost); }

        .current-file-link {
            font-size: .77rem;
            font-weight: 600;
            color: var(--pool);
            text-decoration: none;
        }
        .current-file-link:hover { color: var(--deep); }

        /* Avatar preview */
        .avatar-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: .9rem;
        }

        .avatar-preview {
            width: 52px; height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--mist);
        }

        /* Section label */
        .jf-section-sep {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: .5rem 0 2rem;
        }

        .jf-section-line { flex: 1; height: 1px; background: var(--border); }

        .jf-section-lbl {
            font-size: .67rem;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--ghost);
        }

        /* Trix */
        trix-toolbar {
            background: #fff !important;
            border: 1.5px solid var(--border) !important;
            border-bottom: none !important;
            border-radius: 10px 10px 0 0 !important;
            padding: .45rem .7rem !important;
        }

        trix-editor {
            background: #fff !important;
            border: 1.5px solid var(--border) !important;
            border-top: none !important;
            border-radius: 0 0 10px 10px !important;
            min-height: 150px;
            font-size: .9rem;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            padding: .78rem 1rem !important;
            outline: none !important;
            line-height: 1.7;
        }

        /* Download CV card */
        .cv-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            background: var(--sky);
            border: 1.5px solid var(--mist);
            border-radius: 12px;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .cv-card-text h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--ink);
            margin-bottom: .2rem;
        }

        .cv-card-text p { font-size: .82rem; color: var(--ghost); }

        /* Actions */
        .jf-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            margin-top: .5rem;
        }

        .btn-skip {
            font-size: .84rem;
            font-weight: 600;
            color: var(--ghost);
            text-decoration: none;
            transition: color .15s;
        }
        .btn-skip:hover { color: var(--ink); }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .72rem 2rem;
            background: var(--pool);
            color: #fff;
            font-size: .88rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 3px 14px rgba(123,191,212,.3);
            transition: background .15s, transform .15s;
        }
        .btn-submit:hover { background: var(--deep); transform: translateY(-1px); }

        .btn-dl {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            padding: .62rem 1.25rem;
            background: var(--pool);
            color: #fff;
            font-size: .82rem;
            font-weight: 700;
            border-radius: 9px;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(123,191,212,.25);
            transition: background .15s;
            flex-shrink: 0;
        }
        .btn-dl:hover { background: var(--deep); }

        @media (max-width: 580px) {
            .jf-page { padding: 2rem 1.25rem 3rem; }
            .jf-col2 { grid-template-columns: 1fr; gap: 0; }
            .cv-card { flex-direction: column; align-items: flex-start; }
            .btn-dl { width: 100%; justify-content: center; }
        }
    </style>

    <div class="jf-page">

        <div class="jf-header">
            <p class="jf-eyebrow">Job Seeker</p>
            <h1 class="jf-title">{{ $profile ? 'Edit Your Profile' : 'Complete Your Profile' }}</h1>
            <p class="jf-subtitle">Help employers get to know you better.</p>
        </div>

        @if(session('success'))
        <div class="alert-success">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('jobseeker.profile.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- Profile image --}}
            <div class="jf-section-sep">
                <span class="jf-section-line"></span>
                <span class="jf-section-lbl">Profile Photo</span>
                <span class="jf-section-line"></span>
            </div>

            <div class="jf-field">
                @if($profile && $profile->profile_image)
                <div class="avatar-row">
                    <img src="{{ asset('profile-images/' . $profile->profile_image) }}"
                         alt="Current photo" class="avatar-preview"/>
                    <div>
                        <p style="font-size:.82rem;font-weight:600;color:var(--ink);">Current Photo</p>
                        <p style="font-size:.71rem;color:var(--ghost);">{{ $profile->profile_image }}</p>
                    </div>
                </div>
                @endif
                <label class="jf-label" for="profile_image">{{ $profile && $profile->profile_image ? 'Upload New Photo' : 'Upload Photo' }}</label>
                <p class="jf-hint">JPG or PNG · Max 2MB</p>
                <div class="jf-file">
                    <input type="file" id="profile_image" name="profile_image" accept="image/png,image/jpeg"/>
                </div>
                @error('profile_image')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Contact --}}
            <div class="jf-section-sep">
                <span class="jf-section-line"></span>
                <span class="jf-section-lbl">Contact Information</span>
                <span class="jf-section-line"></span>
            </div>

            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="phone">Phone Number</label>
                    <input class="jf-input" id="phone" name="phone" type="tel"
                           value="{{ old('phone', $profile->phone ?? '') }}"
                           placeholder="+977 98XXXXXXXX" required/>
                    @error('phone')<p class="jf-error">{{ $message }}</p>@enderror
                </div>
                <div class="jf-field" style="grid-column:1/-1;">
                    <label class="jf-label" for="address">Address</label>
                    <textarea class="jf-textarea" id="address" name="address" rows="2"
                              placeholder="City, Area, Street" required>{{ old('address', $profile->address ?? '') }}</textarea>
                    @error('address')<p class="jf-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Professional --}}
            <div class="jf-section-sep">
                <span class="jf-section-line"></span>
                <span class="jf-section-lbl">Professional Details</span>
                <span class="jf-section-line"></span>
            </div>

            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="education">Education</label>
                    <input class="jf-input" id="education" name="education"
                           value="{{ old('education', $profile->education ?? '') }}"
                           placeholder="e.g. Bachelor's in Computer Science" required/>
                    @error('education')<p class="jf-error">{{ $message }}</p>@enderror
                </div>

                <div class="jf-field">
                    <label class="jf-label" for="experience_level">Experience Level</label>
                    <select class="jf-select" id="experience_level" name="experience_level" required>
                        <option value="">Select level</option>
                        <option value="entry"  @selected(old('experience_level', $profile->experience_level ?? '') === 'entry')>Entry Level (0–1 yrs)</option>
                        <option value="junior" @selected(old('experience_level', $profile->experience_level ?? '') === 'junior')>Junior (1–3 yrs)</option>
                        <option value="mid"    @selected(old('experience_level', $profile->experience_level ?? '') === 'mid')>Mid-Level (3–5 yrs)</option>
                        <option value="senior" @selected(old('experience_level', $profile->experience_level ?? '') === 'senior')>Senior (5+ yrs)</option>
                    </select>
                    @error('experience_level')<p class="jf-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="jf-field">
                <label class="jf-label" for="skills">Skills</label>
                <p class="jf-hint">Separate each skill with a comma</p>
                <textarea class="jf-textarea" id="skills" name="skills" rows="2"
                          placeholder="e.g. PHP, Laravel, JavaScript, MySQL, React">{{ old('skills', $profile->skills ?? '') }}</textarea>
                @error('skills')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            <div class="jf-field">
                <label class="jf-label">About Me</label>
                <p class="jf-hint">A short bio that tells employers who you are.</p>
                <input type="hidden" id="bio" name="bio" value="{{ old('bio', $profile->bio ?? '') }}">
                <trix-editor input="bio"></trix-editor>
                @error('bio')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Resume --}}
            <div class="jf-section-sep">
                <span class="jf-section-line"></span>
                <span class="jf-section-lbl">Resume</span>
                <span class="jf-section-line"></span>
            </div>

            <div class="jf-field">
                @if($profile && $profile->resume)
                <div class="current-file">
                    <div class="current-file-ico">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:#e53e3e"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <p class="current-file-name">{{ basename($profile->resume) }}</p>
                        <p class="current-file-sub">Current resume</p>
                    </div>
                    <a href="{{ Storage::url($profile->resume) }}" target="_blank" class="current-file-link">Download</a>
                </div>
                @endif
                <label class="jf-label" for="resume">{{ $profile && $profile->resume ? 'Upload New Resume' : 'Upload Resume' }}</label>
                <p class="jf-hint">PDF, DOC, or DOCX · Max 2MB</p>
                <div class="jf-file">
                    <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx"/>
                </div>
                @error('resume')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Actions --}}
            <div class="jf-actions">
                <a href="/jobs" class="btn-skip">Skip for now</a>
                <button type="submit" class="btn-submit">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                    {{ $profile ? 'Update Profile' : 'Save Profile' }}
                </button>
            </div>

        </form>

        {{-- Download CV --}}
        @if($profile && $profile->phone && $profile->education)
        <div class="cv-card">
            <div class="cv-card-text">
                <h3>Download Your CV</h3>
                <p>Generate a professional PDF CV from your profile.</p>
            </div>
            <a href="{{ route('jobseeker.cv.own') }}" class="btn-dl">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Download CV (PDF)
            </a>
        </div>
        @endif

    </div>
</x-layout>