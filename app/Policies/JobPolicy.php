<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function viewAny(?User $user): bool
    {
        return true; // anyone can see jobs list
    }

    public function view(?User $user, Job $job): bool
    {
        return true; // anyone can view a job
    }

    public function create(User $user): bool
    {
        return true; // logged-in users can create jobs
    }

    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->user_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->user_id;
    }

    public function apply(User $user, Job $job): bool
    {
        return $user->role_type === 'jobseeker';
    }

}
