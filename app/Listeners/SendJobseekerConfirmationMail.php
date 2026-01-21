<?php

namespace App\Listeners;

use App\Events\JobApplied;
use App\Mail\JobseekerApplicationConfirmationMail;
use Illuminate\Support\Facades\Mail;


class SendJobseekerConfirmationMail
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
    public function handle(JobApplied $event): void
    {
        $jobseeker = $event->application->user;

        Mail::to($jobseeker->email)
            ->send(new JobseekerApplicationConfirmationMail($event->application));
    }
}
