<?php

namespace App\Filament\Resources\FlaggedResponses;

use App\Filament\Actions\MarkFlagReviewedAction;
use App\Filament\Resources\FlaggedResponses\Pages\ListFlaggedResponses;
use App\Filament\Resources\SurveySessions\SurveySessionResource;
use App\Models\SurveyResponse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FlaggedResponseResource extends Resource
{
    protected static ?string $model = SurveyResponse::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static ?string $navigationLabel = 'Flags';

    protected static ?string $modelLabel = 'flagged response';

    protected static ?string $slug = 'flags';

    protected static ?int $navigationSort = 3;

    /**
     * @return Builder<SurveyResponse>
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->flagged()
            ->with(['surveySession.survey', 'reviewer'])
            ->visibleTo(auth()->user());
    }

    public static function getNavigationBadge(): ?string
    {
        $unreviewed = static::getEloquentQuery()->whereNull('reviewed_at')->count();

        return $unreviewed > 0 ? (string) $unreviewed : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Flags awaiting review';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('flagged_at', 'desc')
            ->columns([
                TextColumn::make('surveySession.survey.name')
                    ->label('Survey')
                    ->placeholder('-'),
                TextColumn::make('session_id')
                    ->label('Session')
                    ->limit(10)
                    ->url(fn (SurveyResponse $record): ?string => $record->surveySession
                        ? SurveySessionResource::getUrl('edit', ['record' => $record->surveySession])
                        : null),
                TextColumn::make('question')
                    ->wrap()
                    ->limit(80)
                    ->searchable(),
                TextColumn::make('response')
                    ->wrap()
                    ->limit(120)
                    ->searchable(),
                TextColumn::make('flag_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'safeguarding' => 'danger',
                        'struggle_burnout', 'ill_equipped' => 'warning',
                        'event_safety', 'accessibility_complaint' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => $state ? str($state)->headline() : '-'),
                TextColumn::make('flag_severity')
                    ->label('Severity')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'critical' => 'danger',
                        'high' => 'warning',
                        'medium' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => $state ? str($state)->headline() : '-'),
                TextColumn::make('flag_reason')
                    ->label('Reason')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('flag_action_taken')
                    ->label('Action taken')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('flagged_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('reviewed_at')
                    ->label('Reviewed')
                    ->dateTime()
                    ->sortable()
                    ->description(fn (SurveyResponse $record): ?string => $record->reviewer?->name)
                    ->placeholder('Not reviewed'),
                TextColumn::make('review_notes')
                    ->label('Review notes')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('reviewed')
                    ->label('Review status')
                    ->placeholder('All flags')
                    ->trueLabel('Reviewed')
                    ->falseLabel('Awaiting review')
                    ->nullable()
                    ->attribute('reviewed_at'),
                SelectFilter::make('flag_type')
                    ->label('Type')
                    ->options([
                        'safeguarding' => 'Safeguarding',
                        'struggle_burnout' => 'Struggle / Burnout',
                        'ill_equipped' => 'Ill Equipped',
                        'event_safety' => 'Event Safety',
                        'accessibility_complaint' => 'Accessibility Complaint',
                    ]),
                SelectFilter::make('flag_severity')
                    ->label('Severity')
                    ->options([
                        'critical' => 'Critical',
                        'high' => 'High',
                        'medium' => 'Medium',
                        'low' => 'Low',
                    ]),
            ])
            ->recordActions([
                MarkFlagReviewedAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFlaggedResponses::route('/'),
        ];
    }
}
