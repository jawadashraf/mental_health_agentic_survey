<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\SurveySessionResource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestSessions extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(SurveySessionResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Started At')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('completed_at')
                    ->label('Completed At')
                    ->date()
                    ->sortable(),
                TextColumn::make('completed')->sortable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Yes' : 'No' )
                    ->label('Completed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    }),
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
