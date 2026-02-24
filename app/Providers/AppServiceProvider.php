<?php

namespace App\Providers;

use App\Events\ApplicationStatusUpdated;
use App\Events\JobApplied;
use App\Listeners\SendEmployerDatabaseNotification;
use App\Listeners\SendJobseekerDatabaseNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Pagination\Paginator;
use App\Models\Job;
use App\Models\User;
use App\Policies\JobPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Event;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!app()->isProduction());

        Gate::define('create-job', function ($user) {
            return $user->role === 'employer' && $user->employer; 
        });

         // Notify employer when a job seeker applies
        Event::listen(
            JobApplied::class,
            SendEmployerDatabaseNotification::class,
        );

    }

    protected $policies = [
    Job::class => JobPolicy::class,
    
    ];

}
