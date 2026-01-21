<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;

class JobSeekerProfileController extends Controller
{
     public function edit()
    {
        // Only jobseekers can access
        abort_if(Auth::user()->role_type !== 'jobseeker', 403);

        $profile = Auth::user()->jobseekerProfile;

        return view('jobseeker.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        // Only jobseekers can access
        abort_if(Auth::user()->role_type !== 'jobseeker', 403);

        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'education' => 'required|string|max:255',
            'experience_level' => 'required|in:entry,junior,mid,senior',
            'skills' => 'nullable|string',
            'bio' => 'nullable|string|max:1000',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // 2MB maxz
            'profile_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $profile = Auth::user()->jobseekerProfile
            ?? Auth::user()->jobseekerProfile()->create(['user_id' => Auth::id()]);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            // Delete old resume if exists
            if ($profile->resume) {
                Storage::disk('public')->delete($profile->resume);
            }
            
            $validated['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        // Handle profile image upload using Helper
        if ($request->hasFile('profile_image')) {
            ImageHelper::delete($profile->profile_image, 'profile-images');

            $validated['profile_image'] = ImageHelper::upload(
                $request->file('profile_image'),
                'profile-images'
            );
        }

        $profile->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function show(User $user)
    {
        // Only show jobseeker profiles
        abort_if($user->role_type !== 'jobseeker', 404);
        
        // Check if profile exists
        abort_if(!$user->jobseekerProfile, 404, 'Profile not found');
        
        $profile = $user->jobseekerProfile;
        
        return view('jobseeker.show', compact('user', 'profile'));
    }

}
