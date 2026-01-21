<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Pagination\Paginator;
use App\Models\Job;
use App\Models\User;
use App\Policies\JobPolicy;
use Illuminate\Support\Facades\Gate;


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


    }

    protected $policies = [
    Job::class => JobPolicy::class,
    
    ];

}
