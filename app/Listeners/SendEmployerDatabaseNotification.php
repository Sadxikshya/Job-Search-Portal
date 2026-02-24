<?php

namespace App\Listeners;

use App\Events\JobApplied;
use App\Notifications\JobAppliedNotification;

class SendEmployerDatabaseNotification
{
    /**
     * Handle the event — notify the employer via DB.
     */
    public function handle(JobApplied $event): void
    {
        $employer = $event->application->job->user;

        $employer->notify(new JobAppliedNotification($event->application));
    }
}
