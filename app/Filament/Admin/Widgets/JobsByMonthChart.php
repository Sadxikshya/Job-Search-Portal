<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Job;
use Carbon\Carbon;

class JobsByMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Jobs Posted Per Month';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Job::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('count', 'month')
            ->toArray();

        $months = [];
        $counts = [];

        for ($i = 1; $i <= 12; $i++) {
            $months[] = Carbon::create()->month($i)->format('M');
            $counts[] = $data[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jobs',
                    'data' => $counts,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
