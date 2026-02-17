<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use App\Models\Job;

class EmployerApplicationsChart extends ChartWidget
{
    protected static ?string $heading = 'Applications per Employer';

    protected function getData(): array
    {
        $employers = User::where('role_type', 'employer')->get();

        $labels = [];
        $counts = [];

        foreach ($employers as $employer) {

            $applicationCount = Job::where('user_id', $employer->id)
                ->withCount('applications')
                ->get()
                ->sum('applications_count');

            $labels[] = $employer->first_name;
            $counts[] = $applicationCount;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Applications',
                    'data' => $counts,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
