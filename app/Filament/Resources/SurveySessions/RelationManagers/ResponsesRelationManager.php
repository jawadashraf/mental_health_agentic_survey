<?php

namespace App\Filament\Resources\SurveySessions\RelationManagers;

use App\Filament\Actions\MarkFlagReviewedAction;
use App\Models\SurveyResponse;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ResponsesRelationManager extends RelationManager
{
    protected static string $relationship = 'responses';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->modifyQueryUsing(fn (Builder $query) => $query->with('reviewer'))
            ->columns([
                Tables\Columns\TextColumn::make('question_id')
                    ->sortable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('response')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('flag_type')
                    ->label('Flag Type')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'safeguarding' => 'danger',
                        'struggle_burnout', 'ill_equipped' => 'warning',
                        'event_safety', 'accessibility_complaint' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => $state ? str($state)->headline() : 'None')
                    ->sortable(),
                Tables\Columns\TextColumn::make('flag_severity')
                    ->label('Severity')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'critical' => 'danger',
                        'high' => 'warning',
                        'medium' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => $state ? str($state)->headline() : '-')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('flag_reason')
                    ->label('Flag Reason')
                    ->wrap()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('reviewed_at')
                    ->label('Reviewed')
                    ->dateTime()
                    ->description(fn (SurveyResponse $record): ?string => $record->reviewer?->name)
                    ->placeholder(fn (SurveyResponse $record): string => $record->is_flagged ? 'Not reviewed' : '-')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //                Tables\Actions\CreateAction::make(),
            ])
            ->recordActions([
                MarkFlagReviewedAction::make(),
            ])
            ->bulkActions([
                //                Tables\Actions\BulkActionGroup::make([
                //                    Tables\Actions\DeleteBulkAction::make(),
                //                ]),
            ]);
    }
}
