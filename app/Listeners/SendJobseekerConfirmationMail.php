<?php

namespace App\Listeners;

use App\Events\JobApplied;
use App\Mail\JobseekerApplicationConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class SendJobseekerConfirmationMail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Number of times the job may be attempted.
     */
    public int $tries = 3;

    /**
     * Backoff time in seconds between retries.
     *
     * @var array<int, int>
     */
    public array $backoff = [60, 300, 900];

    /**
     * Handle the event.
     */
    public function handle(JobApplied $event): void
    {
        $jobseeker = $event->application->user;

        Mail::to($jobseeker->email)
            ->send(new JobseekerApplicationConfirmationMail($event->application));
    }
}
