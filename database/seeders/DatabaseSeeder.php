<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Create 15 Employers
        |--------------------------------------------------------------------------
        */
        $employers = User::factory(15)->employer()->create();

        /*
        |--------------------------------------------------------------------------
        | 2. Create 25 Jobseekers
        |--------------------------------------------------------------------------
        */
        $jobseekers = User::factory(25)->jobseeker()->create();

        /*
        |--------------------------------------------------------------------------
        | 3. Create Jobseeker Profiles
        |--------------------------------------------------------------------------
        */
        foreach ($jobseekers as $user) {
            $user->jobseekerProfile()->create([
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'education' => fake()->randomElement([
                    'High School',
                    'Diploma',
                    'Bachelor',
                    'Master',
                    'PhD'
                ]),
                'experience_level' => fake()->randomElement([
                    'Entry Level',
                    'Mid Level',
                    'Senior Level',
                    'Lead/Manager'
                ]),
                'skills' => implode(',', fake()->words(5)),
                'bio' => fake()->paragraph(5),
                'resume' => null,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Create 45 Jobs with Random Employer Distribution
        |--------------------------------------------------------------------------
        */

        $totalJobs = 45;
        $minJobsPerEmployer = 1;
        $maxJobsPerEmployer = 5; // optional max

        $jobs = collect();

        // Generate random job counts per employer, sum must be 45
        $jobCounts = [];
        $remainingJobs = $totalJobs;

        foreach ($employers as $index => $employer) {
            $remainingEmployers = $employers->count() - $index;
            $max = min($maxJobsPerEmployer, $remainingJobs - ($remainingEmployers - 1) * $minJobsPerEmployer);
            $count = rand($minJobsPerEmployer, $max);
            $jobCounts[$employer->id] = $count;
            $remainingJobs -= $count;
        }

        // Create jobs per employer
        foreach ($jobCounts as $employerId => $count) {
            $employerJobs = Job::factory($count)->create([
                'user_id' => $employerId,
            ]);

            $jobs = $jobs->merge($employerJobs);
        }

        /*
        |--------------------------------------------------------------------------
        | 5. Job Applications
        | Each jobseeker applies to 2–6 random jobs
        |--------------------------------------------------------------------------
        */
        foreach ($jobseekers as $jobseeker) {
            $jobsToApply = $jobs->random(rand(2, 6));

            foreach ($jobsToApply as $job) {
                JobApplication::firstOrCreate(
                    [
                        'job_id' => $job->id,
                        'user_id' => $jobseeker->id,
                    ],
                    [
                        'jobseeker_name' => $jobseeker->first_name . ' ' . $jobseeker->last_name,
                        'employer_name' => $job->user->first_name . ' ' . $job->user->last_name,
                        'status' => collect(['reviewing','accepted','rejected'])->random(),
                    ]
                );
            }
        }
    }
}