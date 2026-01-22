<x-layout>
    <x-slot:heading>
        Complete Your Profile
    </x-slot:heading>

    <div class="mx-auto max-w-3xl">
        @if (session('success'))
            <div class="mb-6 rounded-lg bg-green-50 p-4 border border-green-200">
                <div class="flex">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <p class="ml-3 text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl">
            <form method="POST" action="{{ route('jobseeker.profile.update') }}" enctype="multipart/form-data" class="px-6 py-8 sm:p-8">
                @csrf
                
                <div class="space-y-8">
                     <!-- Profile Image Upload -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Profile Image</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Upload your avatar (JPG/PNG - Max 2MB)</p>

                        <div class="mt-6">
                            @if($profile && $profile->profile_image)
                                <div class="mb-4 flex items-center gap-4">
                                    <img
                                        src="{{ asset('profile-images/' . $profile->profile_image) }}"
                                        alt="Profile image"
                                        class="w-16 h-16 rounded-full object-cover border border-gray-200"
                                    />
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Current Image</p>
                                        <p class="text-xs text-gray-500">{{ $profile->profile_image }}</p>
                                    </div>
                                </div>
                            @endif

                            <x-form-field>
                                <x-form-label for="profile_image">{{ $profile && $profile->profile_image ? 'Upload New Image' : 'Upload Image' }}</x-form-label>
                                <div class="mt-2">
                                    <input type="file" id="profile_image" name="profile_image" accept="image/png,image/jpeg"
                                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-600 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                                    <x-form-error name="profile_image"/>
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                    <!-- Contact Information -->
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Contact Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">How can employers reach you?</p>
                        
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="phone">Phone Number</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="phone" name="phone" type="tel" 
                                                      value="{{ old('phone', $profile->phone ?? '') }}" 
                                                      placeholder="+977 98XXXXXXXX" required/>
                                        <x-form-error name="phone"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field>
                                    <x-form-label for="address">Address</x-form-label>
                                    <div class="mt-2">
                                        <textarea id="address" name="address" rows="2" required
                                                  class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                  placeholder="City, Area, Street">{{ old('address', $profile->address ?? '') }}</textarea>
                                        <x-form-error name="address"/>
                                    </div>
                                </x-form-field>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Details -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Professional Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Tell employers about your background.</p>

                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="education">Education</x-form-label>
                                    <div class="mt-2">
                                        <x-form-input id="education" name="education" 
                                                      value="{{ old('education', $profile->education ?? '') }}" 
                                                      placeholder="e.g., Bachelor's in Computer Science" required/>
                                        <x-form-error name="education"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-3">
                                <x-form-field>
                                    <x-form-label for="experience_level">Experience Level</x-form-label>
                                    <div class="mt-2">
                                        <select id="experience_level" name="experience_level" required
                                                class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="">Select level</option>
                                            <option value="entry" {{ old('experience_level', $profile->experience_level ?? '') === 'entry' ? 'selected' : '' }}>Entry Level (0-1 years)</option>
                                            <option value="junior" {{ old('experience_level', $profile->experience_level ?? '') === 'junior' ? 'selected' : '' }}>Junior (1-3 years)</option>
                                            <option value="mid" {{ old('experience_level', $profile->experience_level ?? '') === 'mid' ? 'selected' : '' }}>Mid-Level (3-5 years)</option>
                                            <option value="senior" {{ old('experience_level', $profile->experience_level ?? '') === 'senior' ? 'selected' : '' }}>Senior (5+ years)</option>
                                        </select>
                                        <x-form-error name="experience_level"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field>
                                    <x-form-label for="skills">Skills</x-form-label>
                                    <div class="mt-2">
                                        <textarea id="skills" name="skills" rows="3"
                                                  class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                  placeholder="e.g., PHP, Laravel, JavaScript, MySQL, React">{{ old('skills', $profile->skills ?? '') }}</textarea>
                                        <p class="mt-2 text-xs text-gray-500">Separate skills with commas</p>
                                        <x-form-error name="skills"/>
                                    </div>
                                </x-form-field>
                            </div>

                            <div class="sm:col-span-6">
                                <x-form-field class="sm:col-span-6">
                                    <x-form-label for="bio">About Me</x-form-label>

                                    <input type="hidden" id="bio" name="bio" 
                                        value="{{ old('bio', $profile->bio ?? '') }}">

                                    <trix-editor input="bio" class="trix-content"></trix-editor>

                                    <x-form-error name="bio"/>
                                </x-form-field>

                            </div>
                        </div>
                    </div>
                    

                    <!-- Resume Upload -->
                    <div class="border-t border-gray-900/10 pt-8">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Resume</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Upload your latest resume (PDF, DOC, DOCX - Max 2MB)</p>

                        <div class="mt-6">
                            @if($profile && $profile->resume)
                                <div class="mb-4 flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">Current Resume</p>
                                        <p class="text-xs text-gray-500">{{ basename($profile->resume) }}</p>
                                    </div>
                                    <a href="{{ Storage::url($profile->resume) }}" target="_blank" 
                                       class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                                        Download
                                    </a>
                                </div>
                            @endif

                            <x-form-field>
                                <x-form-label for="resume">{{ $profile && $profile->resume ? 'Upload New Resume' : 'Upload Resume' }}</x-form-label>
                                <div class="mt-2">
                                    <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx"
                                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-600 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                                    <x-form-error name="resume"/>
                                </div>
                            </x-form-field>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex items-center justify-between gap-x-6 border-t border-gray-900/10 pt-6">
                    <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">
                        Skip for now
                    </a>
                    <x-form-button>{{ $profile ? 'Update Profile' : 'Save Profile' }}</x-form-button>
                </div>
            </form>
        </div>

        <!-- Download CV Section -->
        @if($profile && $profile->phone && $profile->education)
        <div class="mt-6 bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl">
            <div class="px-6 py-6 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Download Your CV</h3>
                        <p class="mt-1 text-sm text-gray-600">Generate a professional PDF CV from your profile information.</p>
                    </div>
                    <a href="{{ route('jobseeker.cv.own') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-sm font-semibold text-white rounded-lg hover:bg-indigo-700 shadow-sm transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download CV (PDF)
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div>
</x-layout>