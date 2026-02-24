<?php

namespace App\Listeners;

use App\Events\ApplicationStatusUpdated;
use App\Mail\JobStatusUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobStatusUpdatedMail implements ShouldQueue
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
    public function handle(ApplicationStatusUpdated $event): void
    {
        $jobseeker = $event->application->user;

        Mail::to($jobseeker->email)
            ->send(new JobStatusUpdatedMail($event->application));
    }
}
