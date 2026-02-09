<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\JobController as ApiJobController;
use App\Http\Controllers\Api\StatsController;

class HomeController extends Controller
{
    public function index()
    {
        // Calling API controllers directly instead of making HTTP requests
        $apiJobController = new ApiJobController();
        $statsController = new StatsController();

        $jobRequest = new Request(['per_page' => 3]);
        
        // Get jobs from API controller
        $jobsResponse = $apiJobController->index($jobRequest);
        $jobsData = json_decode($jobsResponse->getContent(), true);
        $jobs = $jobsData['data'] ?? [];

        // Get stats from API controller
        $statsResponse = $statsController->index();
        $stats = json_decode($statsResponse->getContent(), true);

        return view('home', compact('jobs', 'stats'));
    }
}