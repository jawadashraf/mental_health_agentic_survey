<?php

namespace App\Filament\Resources\SurveySessions;

use App\Filament\Exports\SurveySessionExporter;
use App\Models\SurveySession;
use BackedEnum;
use Carbon\Carbon;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SurveySessionResource extends Resource
{
    protected static ?string $model = SurveySession::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * @return Builder<SurveySession>
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('survey')
            ->visibleTo(auth()->user());
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Placeholder::make('id')
                    ->content(fn ($record): string => $record->id),
                Forms\Components\Placeholder::make('session_id')
                    ->content(fn ($record): string => $record->session_id),
                Forms\Components\Placeholder::make('survey')
                    ->content(fn ($record): string => $record->survey?->name ?? $record->survey_type ?? '-'),
                Forms\Components\Placeholder::make('created_at')
                    ->content(fn ($record): string => $record->created_at->toFormattedDateString()),
                Forms\Components\Placeholder::make('updated_at')
                    ->content(fn ($record): string => $record->updated_at->toFormattedDateString()),
                Forms\Components\Placeholder::make('completed_at')
                    ->content(fn ($record): string => $record->completed_at ?? ''),
                Forms\Components\Placeholder::make('completed')
                    ->content(fn ($record): string => $record->completed),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('session_id'),
                TextColumn::make('survey.name')
                    ->label('Survey')
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('survey_type')
                    ->badge()
                    ->label('Type')
                    ->color('info'),
                TextColumn::make('created_at')->sortable()->dateTime(),
                TextColumn::make('updated_at')->sortable()->dateTime(),
                TextColumn::make('completed_at')->sortable()->dateTime(),
                TextColumn::make('has_flags')
                    ->label('Flag Status')
                    ->formatStateUsing(fn ($record): string => $record->has_flags ? "Flagged ({$record->flag_count})" : 'Clean')
                    ->badge()
                    ->color(fn ($state): string => $state ? 'danger' : 'success')
                    ->sortable(),
                TextColumn::make('completed')->sortable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' || $state === 'true' ? 'Yes' : 'No')
                    ->label('Completed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1', 'true' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('survey_type')
                    ->options(fn () => static::getEloquentQuery()->distinct()->whereNotNull('survey_type')->pluck('survey_type', 'survey_type')->toArray())
                    ->label('Type'),
                SelectFilter::make('has_flags')
                    ->label('Flagged Sessions')
                    ->options([
                        '1' => 'Flagged Sessions Only',
                        '0' => 'Clean Sessions Only',
                    ]),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from'),
                        DatePicker::make('until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['from'] ?? null) {
                            $indicators[] = 'From '.Carbon::parse($data['from'])->toFormattedDateString();
                        }
                        if ($data['until'] ?? null) {
                            $indicators[] = 'Until '.Carbon::parse($data['until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
            ])
            ->recordActions([
                EditAction::make()->label('Responses'),
            ])
            ->toolbarActions([
                ExportAction::make()
                    ->exporter(SurveySessionExporter::class)
                    ->options(fn ($livewire) => [
                        'survey_type' => $livewire->tableFilters['survey_type']['value'] ?? null,
                    ]),
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->exporter(SurveySessionExporter::class)
                    ->options(fn ($livewire) => [
                        'survey_type' => $livewire->tableFilters['survey_type']['value'] ?? null,
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\IntentsRelationManager::class,
            RelationManagers\ResponsesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurveySessions::route('/'),
            'edit' => Pages\EditSurveySession::route('/{record}/edit'),
        ];
    }
}
