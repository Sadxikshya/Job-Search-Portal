<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Latest 3 jobs with employer — short TTL for freshness
        $jobs = Cache::remember('home_featured_jobs', 120, function () {
            return Job::with('user')
                ->latest()
                ->take(3)
                ->get();
        });

        // All stats aggregated in a single cached block (5-minute TTL)
        $stats = Cache::remember('home_stats', 300, function () {
            // User counts grouped by role_type (1 query instead of 2)
            $userCounts = User::select('role_type')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('role_type')
                ->pluck('total', 'role_type');

            // Job counts grouped by job_type (1 query instead of 4)
            $jobTypeCounts = Job::select('job_type')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('job_type')
                ->pluck('total', 'job_type');

            return [
                'active_jobs'      => Job::count(),
                'companies'        => $userCounts['employer'] ?? 0,
                'job_seekers'      => $userCounts['jobseeker'] ?? 0,
                'successful_hires' => JobApplication::where('status', 'accepted')->count(),
                'full_time'        => $jobTypeCounts['full-time'] ?? 0,
                'part_time'        => $jobTypeCounts['part-time'] ?? 0,
                'contract'         => $jobTypeCounts['contract'] ?? 0,
                'internship'       => $jobTypeCounts['internship'] ?? 0,
            ];
        });

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