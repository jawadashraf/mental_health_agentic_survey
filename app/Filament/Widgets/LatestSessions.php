<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\SurveySessions\SurveySessionResource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestSessions extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(SurveySessionResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('session_id')
                    ->label('Session')
                    ->searchable()
                    ->limit(8),
                Tables\Columns\TextColumn::make('survey_type')
                    ->label('Type')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Started At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('completed')->sortable()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                    ->label('Completed')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                TextColumn::make('responses_count')
                    ->counts('responses')
                    ->label('Responses'),
                TextColumn::make('intents_count')
                    ->counts('intents')
                    ->label('Digressions'),
            ])
            ->actions([

            ]);
    }
}
