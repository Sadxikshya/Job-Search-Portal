<x-layout>
    <x-slot:heading>
        Create Job
</x-slot:heading>
<div class="mx-auto max-w-3xl">
    <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
<form method="POST" action="/jobs" class="px-4 py-6 sm:p-8">
  @csrf 
  <div class="space-y-8">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="font-bold text-blue-500 text-sm">{{ auth()->user()->first_name }} {{ auth()->user()->last_name ?? '' }}</div>
      <h2 class="text-base font-semibold leading-7 text-gray-900">Post a New Job</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Fill in the details below to create your job listing.</p>

      <!-- Basic Information Section -->
      <div class="border-t border-gray-900/10 pt-8">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h3>
        <p class="mt-1 text-sm leading-6 text-gray-600">Provide the essential details about the position.</p>
        
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">

        <div class="sm:col-span-6">
          <x-form-field>
            <x-form-label for="title">Title</x-form-label>
              <div class="mt-2">
                <x-form-input id="title"  name="title" placeholder="titleholder"  required/>
                <x-form-error name="title"/>
              </div>
          </x-form-field>
        </div>

      
        <div class="sm:col-span-6">
          <x-form-field>
              <x-form-label for="description">Description</x-form-label>
              <div class="mt-2">
                  <div class="sm:col-span-6">
                      <label class="block text-sm font-medium text-gray-700">
                          Job Description
                      </label>

                      <input id="description" type="hidden" name="description" value="{{ old('description') }}">

                      <trix-editor input="description" class="mt-1 trix-content"></trix-editor>

                      @error('description')
                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                      @enderror
                  </div>
                  <x-form-error name="description" />
              </div>
          </x-form-field>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-900/10 pt-8">
      <h3 class="text-base font-semibold leading-7 text-gray-900">Job Details</h3>
      <p class="mt-1 text-sm leading-6 text-gray-600">Specify the type, location, and compensation.</p>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
        <div class="sm:col-span-3">   
          <x-form-field class="sm:col-span-3">
              <x-form-label for="job_type">Job Type</x-form-label>
              <div class="mt-2">
                  <select
                      id="job_type"
                      name="job_type"
                      class="w-full rounded-md border-gray-300"
                      required
                  >
                      <option value="">Select type</option>
                      <option value="full-time">Full-time</option>
                      <option value="part-time">Part-time</option>
                      <option value="contract">Contract</option>
                      <option value="internship">Internship</option>
                  </select>

                  <x-form-error name="job_type"/>
              </div>
          </x-form-field>
        </div>

        <div class="sm:col-span-3">
          <x-form-field class="sm:col-span-3">
              <x-form-label for="location">Location</x-form-label>

              <div class="mt-2">
                  <x-form-input
                      id="location"
                      name="location"
                      placeholder="Kathmandu / Remote"
                      required
                  />
                  <x-form-error name="location"/>
              </div>
          </x-form-field>
        </div>


        <div class="sm:col-span-6">
          <x-form-field>
              <x-form-label for="salary">Salary</x-form-label>
              <div class="mt-2">
                <x-form-input id="salary"  name="salary" placeholder="50,999" required />
                <x-form-error name="salary"/>
              </div>
          </x-form-field>
        </div>
      </div>
    </div>



        <div class="border-t border-gray-900/10 pt-8">
          <h3 class="text-base font-semibold leading-7 text-gray-900">Requirements</h3>
          <p class="mt-1 text-sm leading-6 text-gray-600">Define the qualifications needed for this role.</p>
          
          <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <x-form-field>
                <x-form-label for="education">Education</x-form-label>
                <div class="mt-2">
                    <select
                        id="education"
                        name="education"
                        class="block w-full rounded-md border border-gray-300 px-3 py-2"
                        required
                    >
                        <option value="">Select education level</option>
                        <option value="high-school" @selected(old('education') === 'high-school')>High School</option>
                        <option value="diploma" @selected(old('education') === 'diploma')>Diploma</option>
                        <option value="bachelor" @selected(old('education') === 'bachelor')>Bachelor</option>
                        <option value="master" @selected(old('education') === 'master')>Master</option>
                        <option value="phd" @selected(old('education') === 'phd')>PhD</option>
                    </select>


                    <x-form-error name="education"/>
                </div>
              </x-form-field>
            </div>

        <x-form-field class="sm:col-span-3">
            <x-form-label for="experience">Experience (years)</x-form-label>
            <div class="mt-2">
               <select
                    id="experience_level"
                    name="experience_level"
                    class="block w-full rounded-md border border-gray-300 px-3 py-2"
                    required
                >
                    <option value="">Select experience level</option>
                    <option value="Entry Level" @selected(old('experience_level') === 'Entry Level')>Entry Level</option>
                    <option value="Mid Level" @selected(old('experience_level') === 'Mid Level')>Mid Level</option>
                    <option value="Senior Level" @selected(old('experience_level') === 'Senior Level')>Senior Level</option>
                    <option value="Lead/Manager" @selected(old('experience_level') === 'Lead/Manager')>Lead/Manager</option>
                </select>

                <x-form-error name="experience_level"/>
            </div>
        </x-form-field>

        
      </div>
     
    </div>
    
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>

</form>
</x-layout>