<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Employer jobs WITH application count
        $jobs = $user->isEmployer()
            ? $user->jobs()
                ->withCount('applications') 
                ->latest()
                ->get()
            : collect();

        // Jobseeker applied jobs
        $appliedJobs = $user->isEmployer()
            ? collect()
            : $user->appliedJobs()->with('user')
                                ->withPivot('status', 'created_at')
                                ->get();

        return view('profile.show', compact('user', 'jobs', 'appliedJobs'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
