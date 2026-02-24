<?php

namespace App\Listeners;

use App\Events\ApplicationStatusUpdated;
use App\Notifications\ApplicationStatusUpdatedNotification;

class SendJobseekerDatabaseNotification
{
    /**
     * Handle the event — notify the jobseeker via DB.
     */
    public function handle(ApplicationStatusUpdated $event): void
    {
        $jobseeker = $event->application->user;

        $jobseeker->notify(new ApplicationStatusUpdatedNotification($event->application));
    }
}
