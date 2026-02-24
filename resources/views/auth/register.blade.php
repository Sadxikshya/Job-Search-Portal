<x-layout>
    <x-slot:heading>Register</x-slot:heading>

    <link rel="stylesheet" href="/css/profile.css">
    <style>
        .auth-page {
            max-width: 520px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .auth-eyebrow {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: var(--pool);
            margin-bottom: .4rem;
        }

        .auth-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.9rem;
            color: var(--ink);
            line-height: 1.1;
            margin-bottom: .5rem;
        }

        .auth-sub {
            font-size: .88rem;
            color: var(--ghost);
        }

        /* Alert banners */
        .alert-error {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            padding: .9rem 1.1rem;
            background: #fee2e2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            margin-bottom: 1.75rem;
            font-size: .84rem;
            color: #991b1b;
        }

        .alert-loading {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .9rem 1.1rem;
            background: var(--sky);
            border: 1px solid var(--mist);
            border-radius: 10px;
            margin-bottom: 1.75rem;
            font-size: .84rem;
            color: var(--deep);
        }

        @keyframes spin { to { transform: rotate(360deg); } }
        .spin { animation: spin .8s linear infinite; }

        /* Fields */
        .jf-field {
            display: flex;
            flex-direction: column;
            gap: .45rem;
            margin-bottom: 1.5rem;
        }

        .jf-label {
            font-size: .8rem;
            font-weight: 700;
            color: var(--ink);
        }

        .jf-col2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .jf-input,
        .jf-select {
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
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
            background-color: #fff;
        }

        .jf-error {
            font-size: .74rem;
            color: #b91c1c;
            margin-top: -.2rem;
        }

        /* Role type cards */
        .role-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .role-card {
            position: relative;
            cursor: pointer;
        }

        .role-card input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0; height: 0;
        }

        .role-card-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .5rem;
            padding: 1.1rem .75rem;
            border: 1.5px solid var(--border);
            border-radius: 11px;
            background: #fff;
            text-align: center;
            transition: border-color .15s, background .15s, box-shadow .15s;
            cursor: pointer;
        }

        .role-card input:checked + .role-card-inner {
            border-color: var(--pool);
            background: var(--sky);
            box-shadow: 0 0 0 3px rgba(123,191,212,.15);
        }

        .role-card-inner:hover {
            border-color: var(--mist);
        }

        .role-icon {
            font-size: 1.5rem;
            line-height: 1;
        }

        .role-label {
            font-size: .82rem;
            font-weight: 700;
            color: var(--ink);
        }

        .role-hint {
            font-size: .7rem;
            color: var(--ghost);
        }

        /* Section divider */
        .auth-sep {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: .5rem 0 1.75rem;
        }

        .auth-sep-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .auth-sep-text {
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--ghost);
        }

        /* Actions */
        .auth-actions {
            margin-top: 2rem;
        }

        .btn-submit-full {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            padding: .85rem;
            background: var(--pool);
            color: #fff;
            font-size: .9rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 3px 14px rgba(123,191,212,.3);
            transition: background .15s, transform .15s;
        }
        .btn-submit-full:hover { background: var(--deep); transform: translateY(-1px); }
        .btn-submit-full:disabled { opacity: .6; cursor: not-allowed; transform: none; }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: .84rem;
            color: var(--ghost);
        }

        .auth-footer a {
            font-weight: 700;
            color: var(--pool);
            text-decoration: none;
        }
        .auth-footer a:hover { color: var(--deep); }

        @media (max-width: 480px) {
            .jf-col2 { grid-template-columns: 1fr; }
            .role-cards { grid-template-columns: 1fr; }
        }
    </style>

    <div class="auth-page">

        <div class="auth-header">
            <p class="auth-eyebrow">CareerHub</p>
            <h1 class="auth-title">Create an account</h1>
            <p class="auth-sub">Join thousands of professionals finding their next opportunity.</p>
        </div>

        {{-- Loading --}}
        <div id="loadingIndicator" class="alert-loading" style="display:none;">
            <svg class="spin" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 12a8 8 0 018-8"/></svg>
            Creating your account...
        </div>

        {{-- Error --}}
        <div id="errorContainer" class="alert-error" style="display:none;">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span id="errorMessage"></span>
        </div>

        <form id="registerForm">
            @csrf

            {{-- Role selection --}}
            <div class="jf-field">
                <label class="jf-label">I am registering as a</label>
                <div class="role-cards">
                    <label class="role-card">
                        <input type="radio" name="role_type" value="jobseeker" checked/>
                        <div class="role-card-inner">
                            <span class="role-icon">💼</span>
                            <span class="role-label">Job Seeker</span>
                            <span class="role-hint">Find your next role</span>
                        </div>
                    </label>
                    <label class="role-card">
                        <input type="radio" name="role_type" value="employer"/>
                        <div class="role-card-inner">
                            <span class="role-icon">👔</span>
                            <span class="role-label">Employer</span>
                            <span class="role-hint">Hire top talent</span>
                        </div>
                    </label>
                </div>
                <p class="jf-error error-message" data-field="role_type" style="display:none;"></p>
            </div>

            <div class="auth-sep">
                <span class="auth-sep-line"></span>
                <span class="auth-sep-text">Personal Details</span>
                <span class="auth-sep-line"></span>
            </div>

            {{-- Name row --}}
            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="first_name">First Name</label>
                    <input class="jf-input" id="first_name" name="first_name" type="text" placeholder="Ram" required/>
                    <p class="jf-error error-message" data-field="first_name" style="display:none;"></p>
                </div>
                <div class="jf-field">
                    <label class="jf-label" for="last_name">Last Name</label>
                    <input class="jf-input" id="last_name" name="last_name" type="text" placeholder="Shah" required/>
                    <p class="jf-error error-message" data-field="last_name" style="display:none;"></p>
                </div>
            </div>

            {{-- Email --}}
            <div class="jf-field">
                <label class="jf-label" for="email">Email Address</label>
                <input class="jf-input" id="email" name="email" type="email" placeholder="example@gmail.com" required/>
                <p class="jf-error error-message" data-field="email" style="display:none;"></p>
            </div>

            <div class="auth-sep">
                <span class="auth-sep-line"></span>
                <span class="auth-sep-text">Security</span>
                <span class="auth-sep-line"></span>
            </div>

            {{-- Passwords --}}
            <div class="jf-col2">
                <div class="jf-field">
                    <label class="jf-label" for="password">Password</label>
                    <input class="jf-input" id="password" name="password" type="password" required/>
                    <p class="jf-error error-message" data-field="password" style="display:none;"></p>
                </div>
                <div class="jf-field">
                    <label class="jf-label" for="password_confirmation">Confirm Password</label>
                    <input class="jf-input" id="password_confirmation" name="password_confirmation" type="password" required/>
                    <p class="jf-error error-message" data-field="password_confirmation" style="display:none;"></p>
                </div>
            </div>

            <div class="auth-actions">
                <button type="submit" id="submitBtn" class="btn-submit-full">
                    Create Account
                </button>
            </div>
        </form>

        <p class="auth-footer">
            Already have an account? <a href="/login">Sign in</a>
        </p>

    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
                el.textContent = '';
            });
            document.getElementById('errorContainer').style.display = 'none';

            const loadingIndicator = document.getElementById('loadingIndicator');
            const submitBtn = document.getElementById('submitBtn');
            loadingIndicator.style.display = 'flex';
            submitBtn.disabled = true;

            const formData = {
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value,
                role_type: document.querySelector('input[name="role_type"]:checked').value,
            };

            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'include',
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (data.success) {
                    if (data.token) localStorage.setItem('auth_token', data.token);
                    if (data.user)  localStorage.setItem('user', JSON.stringify(data.user));
                    window.location.replace('/jobs');
                } else {
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const el = document.querySelector(`.error-message[data-field="${field}"]`);
                            if (el) { el.textContent = data.errors[field][0]; el.style.display = 'block'; }
                        });
                    }
                    if (data.message) {
                        document.getElementById('errorMessage').textContent = data.message;
                        document.getElementById('errorContainer').style.display = 'flex';
                    }
                }
            } catch (error) {
                document.getElementById('errorMessage').textContent = 'An unexpected error occurred. Please try again.';
                document.getElementById('errorContainer').style.display = 'flex';
            } finally {
                loadingIndicator.style.display = 'none';
                submitBtn.disabled = false;
            }
        });
    </script>
</x-layout>