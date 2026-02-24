<x-layout>
    <x-slot:heading>Account Settings</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .ae-page {
            max-width: 580px;
            margin: 0 auto;
            padding: 3rem 2rem 5rem;
        }

        .ae-header {
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border);
        }

        .ae-eyebrow {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .4rem;
        }

        .ae-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.9rem;
            color: var(--ink);
            line-height: 1.1;
            margin-bottom: .4rem;
        }

        .ae-sub { font-size: .88rem; color: var(--ghost); }

        /* Alert */
        .ae-alert {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .85rem 1.1rem;
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            border-radius: 10px;
            margin-bottom: 1.75rem;
            font-size: .84rem;
            font-weight: 500;
            color: #065f46;
        }

        /* Field */
        .ae-field {
            display: flex;
            flex-direction: column;
            gap: .45rem;
            margin-bottom: 1.75rem;
        }

        .ae-label {
            font-size: .8rem;
            font-weight: 700;
            color: var(--ink);
        }

        .ae-col2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .ae-input,
        .ae-select {
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

        .ae-input:focus,
        .ae-select:focus {
            border-color: var(--pool);
            box-shadow: 0 0 0 4px rgba(123,191,212,.13);
        }

        .ae-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='none' viewBox='0 0 10 6'%3E%3Cpath stroke='%238b9aab' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' d='M1 1l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
            background-color: #fff;
        }

        .ae-error {
            font-size: .74rem;
            color: #b91c1c;
            margin-top: -.2rem;
        }

        /* Section sep */
        .ae-sep {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: .25rem 0 1.75rem;
        }

        .ae-sep-line { flex: 1; height: 1px; background: var(--border); }

        .ae-sep-text {
            font-size: .67rem;
            font-weight: 700;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--ghost);
        }

        /* Role cards */
        .ae-role-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .ae-role-card { position: relative; cursor: pointer; }

        .ae-role-card input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0; height: 0;
        }

        .ae-role-card-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .45rem;
            padding: 1rem .75rem;
            border: 1.5px solid var(--border);
            border-radius: 11px;
            background: #fff;
            text-align: center;
            transition: border-color .15s, background .15s, box-shadow .15s;
            cursor: pointer;
        }

        .ae-role-card input:checked + .ae-role-card-inner {
            border-color: var(--pool);
            background: var(--sky);
            box-shadow: 0 0 0 3px rgba(123,191,212,.15);
        }

        .ae-role-card-inner:hover { border-color: var(--mist); }

        .ae-role-icon { font-size: 1.4rem; line-height: 1; }
        .ae-role-label { font-size: .82rem; font-weight: 700; color: var(--ink); }
        .ae-role-hint { font-size: .7rem; color: var(--ghost); }

        /* Change password link */
        .ae-pwd-link {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            padding: .65rem 1.1rem;
            background: var(--frost);
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-size: .82rem;
            font-weight: 600;
            color: var(--body);
            text-decoration: none;
            transition: border-color .15s, color .15s, background .15s;
        }

        .ae-pwd-link:hover {
            border-color: var(--pool);
            color: var(--deep);
            background: var(--sky);
        }

        /* Actions */
        .ae-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            margin-top: .5rem;
        }

        .ae-cancel {
            font-size: .84rem;
            font-weight: 600;
            color: var(--ghost);
            text-decoration: none;
            transition: color .15s;
        }
        .ae-cancel:hover { color: var(--ink); }

        .ae-submit {
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
        .ae-submit:hover { background: var(--deep); transform: translateY(-1px); }

        @media (max-width: 480px) {
            .ae-col2 { grid-template-columns: 1fr; }
            .ae-role-cards { grid-template-columns: 1fr; }
            .ae-page { padding: 2rem 1.25rem 3rem; }
        }
    </style>

    <div class="ae-page">

        <div class="ae-header">
            <p class="ae-eyebrow">Account</p>
            <h1 class="ae-title">Account Settings</h1>
            <p class="ae-sub">Update your personal details and account preferences.</p>
        </div>

        @if(session('success'))
        <div class="ae-alert">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="/profile">
            @csrf
            @method('PATCH')

            {{-- Role --}}
            {{-- <div class="ae-sep">
                <span class="ae-sep-line"></span>
                <span class="ae-sep-text">Account Type</span>
                <span class="ae-sep-line"></span>
            </div>

            <div class="ae-role-cards">
                <label class="ae-role-card">
                    <input type="radio" name="role_type" value="jobseeker" {{ $user->role_type === 'jobseeker' ? 'checked' : '' }}/>
                    <div class="ae-role-card-inner">
                        <span class="ae-role-icon">💼</span>
                        <span class="ae-role-label">Job Seeker</span>
                        <span class="ae-role-hint">Find your next role</span>
                    </div>
                </label>
                <label class="ae-role-card">
                    <input type="radio" name="role_type" value="employer" {{ $user->role_type === 'employer' ? 'checked' : '' }}/>
                    <div class="ae-role-card-inner">
                        <span class="ae-role-icon">👔</span>
                        <span class="ae-role-label">Employer</span>
                        <span class="ae-role-hint">Hire top talent</span>
                    </div>
                </label>
            </div> --}}
            <x-form-error name="role_type"/>

            {{-- Personal --}}
            <div class="ae-sep">
                <span class="ae-sep-line"></span>
                <span class="ae-sep-text">Personal Details</span>
                <span class="ae-sep-line"></span>
            </div>

            <div class="ae-col2">
                <div class="ae-field">
                    <label class="ae-label" for="first_name">First Name</label>
                    <input class="ae-input" id="first_name" name="first_name" type="text"
                           value="{{ old('first_name', $user->first_name) }}" placeholder="Ram" required/>
                    <x-form-error name="first_name"/>
                </div>
                <div class="ae-field">
                    <label class="ae-label" for="last_name">Last Name</label>
                    <input class="ae-input" id="last_name" name="last_name" type="text"
                           value="{{ old('last_name', $user->last_name) }}" placeholder="Khatri" required/>
                    <x-form-error name="last_name"/>
                </div>
            </div>

            <div class="ae-field">
                <label class="ae-label" for="email">Email Address</label>
                <input class="ae-input" id="email" name="email" type="email"
                       value="{{ old('email', $user->email) }}" placeholder="ram@gmail.com" required/>
                <x-form-error name="email"/>
            </div>

            {{-- Security --}}
            <div class="ae-sep">
                <span class="ae-sep-line"></span>
                <span class="ae-sep-text">Security</span>
                <span class="ae-sep-line"></span>
            </div>

            <div class="ae-field">
                <label class="ae-label">Password</label>
                <a href="{{ route('password.edit') }}" class="ae-pwd-link">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                    Change Password
                </a>
            </div>

            <div class="ae-actions">
                <a href="/jobs" class="ae-cancel">Cancel</a>
                <button type="submit" class="ae-submit">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
                    Save Changes
                </button>
            </div>

        </form>
    </div>

</x-layout>