<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->color('primary'),

            Stat::make('Employers', User::where('role_type', 'employer')->count())
                ->color('success'),

            Stat::make('Job Seekers', User::where('role_type', 'jobseeker')->count())
                ->color('info'),

            Stat::make('Total Jobs', Job::count())
                ->color('warning'),

            Stat::make('Applications', JobApplication::count())
                ->color('danger'),
        ];
    }
}
