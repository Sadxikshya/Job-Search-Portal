<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    public function definition(): array
    {
        $statusOptions = ['reviewing', 'accepted', 'rejected'];

        $jobseeker = User::factory()->jobseeker()->create();
        $job = Job::factory()->create();

        return [
            'job_id' => Job::inRandomOrder()->first()->id,
            'user_id' => User::where('role_type', 'jobseeker')->inRandomOrder()->first()->id,
            'jobseeker_name' => $jobseeker->first_name . ' ' . $jobseeker->last_name,
            'employer_name' => $job->user->first_name . ' ' . $job->user->last_name,
            'status' => $this->faker->randomElement($statusOptions),
        ];
    }
}
