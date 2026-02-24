<?php

namespace App\Notifications;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class JobAppliedNotification extends Notification
{
    use Queueable;

    public function __construct(protected JobApplication $application) {}

    /**
     * Deliver only via database.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Data stored in the notifications table.
     */
    public function toDatabase(object $notifiable): array
    {
        $job = $this->application->job;

        return [
            'application_id'  => $this->application->id,
            'job_id'          => $job->id,
            'job_title'       => $job->title,
            'jobseeker_name'  => $this->application->jobseeker_name,
            'message'         => "{$this->application->jobseeker_name} applied for \"{$job->title}\".",
        ];
    }
}
