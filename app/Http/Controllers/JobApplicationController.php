<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use App\Events\JobApplied;
use App\Events\ApplicationStatusUpdated;


class JobApplicationController extends Controller
{
    public function store(Job $job)
    {
        $user = Auth::user();

        // jobseekers only
        if ($user->role_type !== 'jobseeker') {
            abort(403);
        }

        // prevent duplicate application
        if ($job->applications()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'You already applied for this job.');
        }
        
        $application = JobApplication::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'jobseeker_name' => $user->first_name . ' ' . $user->last_name,
            'employer_name' => $job->user->first_name . ' ' . $job->user->last_name,
            'status' => 'reviewing',
        ]);

        event(new JobApplied($application));

        return back()->with('success', 'Applied successfully!');
    }

    public function index(Job $job)
    {
        // Only job owner can see applicants
        abort_if(auth()->id() !== $job->user_id, 403);

        $applications = $job->applications()
            ->with('user.jobseekerProfile')
            ->latest()
            ->get();

        return view('applications.index', compact('job', 'applications'));
    }


    public function updateStatus(Request $request, JobApplication $application)
    {
        // only job owner
        abort_if(auth()->id() !== $application->job->user_id, 403);

        $request->validate([
            'status' => ['required', 'in:reviewing,accepted,rejected'],
        ]);

        $oldStatus = $application->status;

        $application->update([
            'status' => $request->status,
        ]);

        event(new ApplicationStatusUpdated($application, $oldStatus));
        
        return back()->with('success', 'Application status updated.');
    }


}
