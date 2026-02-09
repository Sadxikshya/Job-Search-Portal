<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query()
            ->with('user')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');  // this will be free text search and others will be my filters
            })
            ->when($request->filled('location'), function ($query) use ($request) {
                $query->where('location', 'like', '%' . $request->location . '%');
            })
            ->when($request->filled('job_type'), function ($query) use ($request) {
                $query->where('job_type', $request->job_type);
            })
            ->when($request->filled('salary_min'), function ($query) use ($request) {
                $query->where('salary', '>=', $request->salary_min);
            })
            ->when($request->filled('salary_max'), function ($query) use ($request) {
                $query->where('salary', '<=', $request->salary_max);
            })
            ->when($request->filled('experience_level'), function ($query) use ($request) {
                $query->where('experience_level', $request->experience_level);
            })
            ->latest()
            ->paginate(9)
            ->withQueryString(); //  keeps filters during pagination just changes page number 

        return view('jobs.index', compact('jobs'));
    }

    
    public function create() 
    {
        return view('jobs.create');
    }

    public function show(Job $job) 
    {
        // Initialize flags
        $canEdit = false;
        $alreadyApplied = false;
        $showApplyButton = false;

        if (auth()->check()) {
            $user = auth()->user();

            // EMPLOYER: Can edit if owner
            if ($user->role_type === 'employer' && $user->id === $job->user_id) {
                $canEdit = true;
            }

            // JOBSEEKER: Check if already applied
            if ($user->role_type === 'jobseeker') {
                $alreadyApplied = $job->applications()
                                    ->where('user_id', $user->id)
                                    ->exists();

                // Show apply button if not applied yet
                $showApplyButton = !$alreadyApplied;
            }
        }
        // Return all necessary variables to Blade
        return view('jobs.show', [
        'job' => $job,
        'canEdit' => $canEdit,
        'alreadyApplied' => $alreadyApplied,
        'showApplyButton' => $showApplyButton
    ]);

    }

    public function store(StoreJobRequest $request) 
    {
        Auth::user()->jobs()->create($request->validated());

        return redirect('/jobs');
    }

    public function edit(Job $job) 
    {     
        // $this->authorize('update', $job);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(UpdateJobRequest $request, Job $job) 
    {
        // $this->authorize('update', $job);

        $job->update($request->validated());

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully.');
    }


    public function destroy(Job $job)
    {
        // $this->authorize('delete', $job);
        //no need to use findorfail because i have used route modelbinding in my routes
        $job->delete();

        return redirect('/jobs')->with('success', 'Job deleted successfully.');
    }


}
