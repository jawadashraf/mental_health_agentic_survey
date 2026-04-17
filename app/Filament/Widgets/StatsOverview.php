<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSessions = \App\Models\SurveySession::count();
        $completedSessions = \App\Models\SurveySession::where('completed', true)->count();
        $completionRate = $totalSessions > 0 ? round(($completedSessions / $totalSessions) * 100, 1) : 0;
        $totalIntents = \App\Models\Intent::count();

        return [
            Stat::make('Total Sessions', number_format($totalSessions))
                ->description('Total survey sessions started')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Completion Rate', $completionRate . '%')
                ->description($completedSessions . ' sessions completed')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color($completionRate > 50 ? 'success' : 'warning'),

            Stat::make('Digressions', number_format($totalIntents))
                ->description('Total user digressions/intents logged')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('primary'),
        ];
    }
}
