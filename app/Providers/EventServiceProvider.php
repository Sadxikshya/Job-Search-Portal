<?php

namespace App\Providers;

use App\Events\ApplicationStatusUpdated;
use App\Events\JobApplied;
use App\Listeners\SendEmployerJobAppliedMail;
use Illuminate\Support\ServiceProvider;
use App\Events\UserRegistered;
use App\Listeners\SendJobseekerConfirmationMail;
use App\Listeners\SendJobStatusUpdatedMail;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\SendEmployerDatabaseNotification;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        UserRegistered::class => [
            SendWelcomeEmail::class,
        ],

        ApplicationStatusUpdated::class => [
            SendJobStatusUpdatedMail::class,
        ],

        JobApplied::class => [
            SendEmployerJobAppliedMail::class,
            SendJobseekerConfirmationMail::class,
            SendEmployerDatabaseNotification::class,
        ],

    ];


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
