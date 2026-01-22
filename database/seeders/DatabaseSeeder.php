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
        | 1. Create Employers
        |--------------------------------------------------------------------------
        */
        $employers = User::factory(5)
            ->employer()
            ->create();

        /*
        |--------------------------------------------------------------------------
        | 2. Create Jobseekers
        |--------------------------------------------------------------------------
        */
        $jobseekers = User::factory(10)
            ->jobseeker()
            ->create();

        /*
        |--------------------------------------------------------------------------po
        | 3. Create Jobseeker Profiles
        |--------------------------------------------------------------------------
        */
        foreach ($jobseekers as $user) {
            $user->jobseekerProfile()->create([
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'education' => fake()->randomElement([
                    'Bachelor', 'Master', 'PhD'
                ]),
                'experience_level' => fake()->randomElement([
                    'Entry Level',
                    'Mid Level',
                    'Senior Level',
                    'Lead/Manager'
                ]),
                'skills' => implode(',', fake()->words(5)),
                'bio' => fake()->paragraph(10),
                'resume' => null,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Create Jobs (Assigned to Random Employers)
        |--------------------------------------------------------------------------
        */
        $jobs = Job::factory(40)
            ->make()
            ->each(fn ($job) => $job->user_id = $employers->random()->id)
            ->each->save();

        /*
        |--------------------------------------------------------------------------
        | 5. Applications
        | Each jobseeker applies to MULTIPLE jobs
        |--------------------------------------------------------------------------
        */
        foreach ($jobseekers as $jobseeker) {

            // Each jobseeker applies to 3–7 unique jobs
            $jobsToApply = $jobs->random(rand(3, 7));

            foreach ($jobsToApply as $job) {
                JobApplication::firstOrCreate(
                    [
                        'job_id'  => $job->id,
                        'user_id' => $jobseeker->id,
                    ],
                    [
                        'jobseeker_name' => $jobseeker->first_name . ' ' . $jobseeker->last_name,
                        'employer_name'  => $job->user->first_name . ' ' . $job->user->last_name,
                        'status'         => collect([
                            'reviewing',
                            'accepted',
                            'rejected'
                        ])->random(),
                    ]
                );
            }
        }
    }
}
