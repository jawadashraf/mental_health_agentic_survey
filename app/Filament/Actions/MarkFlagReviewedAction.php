<?php

namespace App\Filament\Actions;

use App\Models\SurveyResponse;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Support\Icons\Heroicon;

class MarkFlagReviewedAction
{
    public static function make(): Action
    {
        return Action::make('markReviewed')
            ->label('Mark reviewed')
            ->icon(Heroicon::OutlinedCheckBadge)
            ->color('success')
            ->authorize('review')
            ->visible(fn (SurveyResponse $record): bool => $record->is_flagged && ! $record->isReviewed())
            ->modalHeading('Mark flag as reviewed')
            ->schema([
                Textarea::make('review_notes')
                    ->label('Notes')
                    ->placeholder('What action was taken?')
                    ->rows(3)
                    ->maxLength(2000),
            ])
            ->action(function (SurveyResponse $record, array $data): void {
                $record->markReviewed(auth()->user(), $data['review_notes'] ?? null);
            })
            ->successNotificationTitle('Flag marked as reviewed');
    }
}
