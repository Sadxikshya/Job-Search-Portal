<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .jf-page {
            max-width: 860px;
            margin: 0 auto;
            padding: 3rem 2rem 5rem;
        }

        /* ── Page header ── */
        .jf-header {
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border);
        }

        .jf-eyebrow {
            font-size: .67rem;
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

        .jf-subtitle {
            font-size: .9rem;
            color: var(--ghost);
        }

        /* ── Field ── */
        .jf-field {
            display: flex;
            flex-direction: column;
            gap: .55rem;
            margin-bottom: 2.25rem;
        }

        .jf-label {
            font-size: .8rem;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: .01em;
        }

        .jf-hint {
            font-size: .76rem;
            color: var(--ghost);
            margin-top: -.3rem;
        }

        .jf-input,
        .jf-select {
            background: #fff;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: .85rem 1.1rem;
            font-size: .93rem;
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
            width: 100%;
            box-sizing: border-box;
        }

        .jf-input::placeholder { color: #b8c4cc; }

        .jf-input:focus,
        .jf-select:focus {
            border-color: var(--pool);
            box-shadow: 0 0 0 4px rgba(123,191,212,.13);
        }

        .jf-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='none' viewBox='0 0 10 6'%3E%3Cpath stroke='%238b9aab' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' d='M1 1l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1.1rem center;
            padding-right: 2.75rem;
            cursor: pointer;
            background-color: #fff;
        }

        .jf-col2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.75rem;
        }

        .jf-error {
            font-size: .76rem;
            color: #b91c1c;
            margin-top: -.25rem;
        }

        /* Trix */
        trix-toolbar {
            background: #fff !important;
            border: 1.5px solid var(--border) !important;
            border-bottom: none !important;
            border-radius: 10px 10px 0 0 !important;
            padding: .55rem .85rem !important;
        }

        trix-editor {
            background: #fff !important;
            border: 1.5px solid var(--border) !important;
            border-top: none !important;
            border-radius: 0 0 10px 10px !important;
            min-height: 180px;
            font-size: .93rem;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            padding: .85rem 1.1rem !important;
            outline: none !important;
            line-height: 1.7;
        }

        trix-editor:focus-within {
            box-shadow: 0 0 0 4px rgba(123,191,212,.13);
        }

        /* ── Actions ── */
        .jf-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            margin-top: .75rem;
        }

        .jf-btn-cancel {
            font-size: .86rem;
            font-weight: 600;
            color: var(--ghost);
            background: none;
            border: none;
            padding: .65rem 1rem;
            border-radius: 9px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: color .15s, background .15s;
        }
        .jf-btn-cancel:hover { color: var(--ink); background: var(--frost); }

        .jf-btn-submit {
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
            transition: background .15s, transform .15s, box-shadow .15s;
        }
        .jf-btn-submit:hover {
            background: var(--deep);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(58,125,150,.28);
        }

        @media (max-width: 600px) {
            .jf-page { padding: 2rem 1.25rem 3rem; }
            .jf-col2 { grid-template-columns: 1fr; gap: 0; }
            .jf-title { font-size: 1.55rem; }
        }
    </style>

    <div class="jf-page">

        <div class="jf-header">
            <p class="jf-eyebrow">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
            <h1 class="jf-title">Post a New Job</h1>
            <p class="jf-subtitle">Fill in the details below to create your listing.</p>
        </div>

        <form method="POST" action="/jobs">
            @csrf

            {{-- Title --}}
            <div class="jf-field">
                <label class="jf-label" for="title">Job Title</label>
                <p class="jf-hint">Be specific — e.g. "Senior Backend Developer" not just "Developer"</p>
                <input class="jf-input" id="title" name="title" type="text"
                       placeholder="e.g. Software Engineer" value="{{ old('title') }}" required/>
                @error('title')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Description --}}
            <div class="jf-field">
                <label class="jf-label">Job Description</label>
                <p class="jf-hint">Describe the role, responsibilities, and what makes this opportunity great.</p>
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
                @error('description')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Type + Location --}}
            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="job_type">Job Type</label>
                    <select class="jf-select" id="job_type" name="job_type" required>
                        <option value="">Select type</option>
                        <option value="full-time"  @selected(old('job_type') === 'full-time')>Full-time</option>
                        <option value="part-time"  @selected(old('job_type') === 'part-time')>Part-time</option>
                        <option value="contract"   @selected(old('job_type') === 'contract')>Contract</option>
                        <option value="internship" @selected(old('job_type') === 'internship')>Internship</option>
                    </select>
                    @error('job_type')<p class="jf-error">{{ $message }}</p>@enderror
                </div>

                <div class="jf-field">
                    <label class="jf-label" for="location">Location</label>
                    <input class="jf-input" id="location" name="location" type="text"
                           placeholder="Kathmandu / Remote" value="{{ old('location') }}" required/>
                    @error('location')<p class="jf-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Salary --}}
            <div class="jf-field">
                <label class="jf-label" for="salary">Monthly Salary (Rs.)</label>
                <input class="jf-input" id="salary" name="salary" type="text"
                       placeholder="e.g. 50,000" value="{{ old('salary') }}" required/>
                @error('salary')<p class="jf-error">{{ $message }}</p>@enderror
            </div>

            {{-- Education + Experience --}}
            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="education">Education Required</label>
                    <select class="jf-select" id="education" name="education" required>
                        <option value="">Select level</option>
                        <option value="high-school" @selected(old('education') === 'high-school')>High School</option>
                        <option value="diploma"     @selected(old('education') === 'diploma')>Diploma</option>
                        <option value="bachelor"    @selected(old('education') === 'bachelor')>Bachelor</option>
                        <option value="master"      @selected(old('education') === 'master')>Master</option>
                        <option value="phd"         @selected(old('education') === 'phd')>PhD</option>
                    </select>
                    @error('education')<p class="jf-error">{{ $message }}</p>@enderror
                </div>

                <div class="jf-field">
                    <label class="jf-label" for="experience_level">Experience Level</label>
                    <select class="jf-select" id="experience_level" name="experience_level" required>
                        <option value="">Select level</option>
                        <option value="Entry Level"  @selected(old('experience_level') === 'Entry Level')>Entry Level</option>
                        <option value="Mid Level"    @selected(old('experience_level') === 'Mid Level')>Mid Level</option>
                        <option value="Senior Level" @selected(old('experience_level') === 'Senior Level')>Senior Level</option>
                        <option value="Lead/Manager" @selected(old('experience_level') === 'Lead/Manager')>Lead/Manager</option>
                    </select>
                    @error('experience_level')<p class="jf-error">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Actions --}}
            <div class="jf-actions">
                <button type="button" class="jf-btn-cancel">Cancel</button>
                <button type="submit" class="jf-btn-submit">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                    Post Job
                </button>
            </div>

        </form>
    </div>
</x-layout>