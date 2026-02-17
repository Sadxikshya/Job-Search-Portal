<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Latest 3 jobs with employer
        $jobs = Job::with('user')
            ->latest()
            ->take(3)
            ->get();

        // Total jobs
        $activeJobs = Job::count();

        // Users grouped by role_type 
        $userCounts = User::select('role_type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('role_type')
            ->pluck('total', 'role_type');

        // Job applications accepted
        $successfulHires = JobApplication::where('status', 'accepted')->count();

        // Jobs grouped by job_type (1 query instead of 4)
        $jobTypeCounts = Job::select('job_type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('job_type')
            ->pluck('total', 'job_type');

        $stats = [
            'active_jobs' => $activeJobs,
            'companies' => $userCounts['employer'] ?? 0,
            'job_seekers' => $userCounts['jobseeker'] ?? 0,
            'successful_hires' => $successfulHires,
            'full_time' => $jobTypeCounts['full-time'] ?? 0,
            'part_time' => $jobTypeCounts['part-time'] ?? 0,
            'contract' => $jobTypeCounts['contract'] ?? 0,
            'internship' => $jobTypeCounts['internship'] ?? 0,
        ];

        return view('home', compact('jobs', 'stats'));
    }
}

    // // Calling API controllers directly instead of making HTTP requests
    //     $apiJobController = new ApiJobController();
    //     $statsController = new StatsController();

    //     $jobRequest = new Request(['per_page' => 3]);
        
    //     // Get jobs from API controller
    //     $jobsResponse = $apiJobController->index($jobRequest);
    //     $jobsData = json_decode($jobsResponse->getContent(), true);
    //     $jobs = $jobsData['data'] ?? [];

    //     // Get stats from API controller
    //     $statsResponse = $statsController->index();
    //     $stats = json_decode($statsResponse->getContent(), true);

    //     return view('home', compact('jobs', 'stats'));