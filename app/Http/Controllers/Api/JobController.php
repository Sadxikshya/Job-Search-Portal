<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
    */
    
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 3);

        $cacheKey = 'jobs_' . md5($request->fullUrl());

        $jobs = Cache::remember($cacheKey, 60, function () use ($request, $perPage) {
            return Job::with('user')
                ->when($request->filled('search'), fn ($q) =>
                    $q->where('title', 'like', "%{$request->search}%")
                )
                ->when($request->filled('location'), fn ($q) =>
                    $q->where('location', 'like', "%{$request->location}%")
                )
                ->when($request->filled('job_type'), fn ($q) =>
                    $q->where('job_type', $request->job_type)
                )
                ->when($request->filled('salary_min'), fn ($q) =>
                    $q->where('salary', '>=', $request->salary_min)
                )
                ->when($request->filled('salary_max'), fn ($q) =>
                    $q->where('salary', '<=', $request->salary_max)
                )
                ->when($request->filled('experience_level'), fn ($q) =>
                    $q->where('experience_level', $request->experience_level)
                )
                ->latest()
                ->paginate($perPage);
        });

        return response()->json($jobs);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreJobRequest $request)
    {
        $job = Auth::user()->jobs()->create($request->validated());
        Cache::flush();
        return response()->json([
            'success' => true,
            'message' => 'Job created successfully',
            'job' => $job,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return response()->json([
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $job->update($request->validated());
        Cache::flush();
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
        Cache::flush();
        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully',
        ]);
    }
}
