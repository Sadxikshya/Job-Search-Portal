<?php

namespace App\Listeners;

use App\Events\JobApplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerJobAppliedMail;


class SendEmployerJobAppliedMail implements ShouldQueue
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
        $job = $event->application->job;
        $employer = $job->user;

        Mail::to($employer->email)
            ->send(new EmployerJobAppliedMail($event->application));
    }
}
