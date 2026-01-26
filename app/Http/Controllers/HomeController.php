<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\User;
use App\Models\JobApplication;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')->latest()->take(3)->get();


        $stats = [
            'active_jobs' => Job::count(),
            'companies' => User::where('role_type', 'employer')->count(),
            'job_seekers' => User::where('role_type', 'jobseeker')->count(),
            'successful_hires' => JobApplication::where('status', 'accepted')->count(),
            'full_time' => Job::where('job_type','full-time')->count(),
            'part_time' => Job::where('job_type','part-time')->count(),
            'contract' => Job::where('job_type','contract')->count(),
            'internship' => Job::where('job_type','internship')->count(),
        ];

        return view('home', compact('jobs','stats'));



    }
}
