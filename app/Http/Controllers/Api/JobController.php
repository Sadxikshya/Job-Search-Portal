<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = Job::with('user')
            ->when($request->filled('search'), fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->when($request->filled('location'), fn($q) => $q->where('location', 'like', "%{$request->location}%"))
            ->when($request->filled('job_type'), fn($q) => $q->where('job_type', $request->job_type))
            ->when($request->filled('salary_min'), fn($q) => $q->where('salary', '>=', $request->salary_min))
            ->when($request->filled('salary_max'), fn($q) => $q->where('salary', '<=', $request->salary_max))
            ->when($request->filled('experience_level'), fn($q) => $q->where('experience_level', $request->experience_level))
            ->latest()
            ->paginate(10);

        return response()->json($jobs);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|in:full-time,part-time,remote',
            'education' => 'required|string|in:high-school,diploma,bachelor,master,phd',
            'experience_level' => 'required|in:Entry Level,Mid Level,Senior Level,Lead/Manager',
        ]);

        $job = Auth::user()->jobs()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Job created successfully',
            'job' => $job,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return response()->json([
            'job' => $job->load('user')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job); // ensure owner can edit

        $validated = $request->validate([
            'title' => 'required|min:3',
            'salary' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|in:full-time,part-time,remote',
            'education' => 'required|string|in:high-school,diploma,bachelor,master,phd',
            'experience_level' => 'required|in:Entry Level,Mid Level,Senior Level,Lead/Manager',
        ]);

        $job->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Job updated successfully',
            'job' => $job,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job); 

        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully',
        ]);
    }
}
