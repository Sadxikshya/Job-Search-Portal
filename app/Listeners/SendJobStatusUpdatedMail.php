<?php

namespace App\Listeners;

use App\Events\ApplicationStatusUpdated;
use App\Mail\JobStatusUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobStatusUpdatedMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

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
