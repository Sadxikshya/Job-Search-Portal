<?php

namespace App\Http\Controllers;
use App\Models\Job;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')->latest()->take(3)->get();
        return view('home', compact('jobs'));

    }
}
