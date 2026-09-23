<?php

namespace App\Filament\Widgets;

use App\Models\Intent;
use App\Models\SurveySession;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class IntentsChart extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected ?string $heading = 'Intent Distribution';

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {
        $visibleSessionIds = SurveySession::query()->visibleTo(auth()->user())->select('session_id');

        $data = Intent::query()
            ->whereIn('session_id', $visibleSessionIds)
            ->select('intent', DB::raw('count(*) as count'))
            ->groupBy('intent')
            ->pluck('count', 'intent')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'User Intents',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#36A2EB',
                        '#FF6384',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                    ],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }
}
