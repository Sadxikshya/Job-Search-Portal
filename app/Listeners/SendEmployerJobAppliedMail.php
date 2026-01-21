<?php

namespace App\Listeners;

use App\Events\JobApplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerJobAppliedMail;


class SendEmployerJobAppliedMail
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
        $job = $event->application->job;
        $employer = $job->user;

        Mail::to($employer->email)
            ->send(new EmployerJobAppliedMail($event->application));
    }
}
