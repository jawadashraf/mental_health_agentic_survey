<?php

namespace App\Filament\Resources\SurveySessions;

use App\Filament\Exports\SurveySessionExporter;
use App\Models\SurveySession;
use App\Settings\PromptSettings;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class SurveySessionResource extends Resource
{
    protected static ?string $model = SurveySession::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Placeholder::make('id')
                    ->content(fn ($record): string => $record->id),
                Forms\Components\Placeholder::make('session_id')
                    ->content(fn ($record): string => $record->session_id),
                Forms\Components\Placeholder::make('created_at')
                    ->content(fn ($record): string => $record->created_at->toFormattedDateString()),
                Forms\Components\Placeholder::make('updated_at')
                    ->content(fn ($record): string => $record->updated_at->toFormattedDateString()),
                Forms\Components\Placeholder::make('completed_at')
                    ->content(fn ($record): string => $record->completed_at ?? ''),
                Forms\Components\Placeholder::make('completed')
                    ->content(fn ($record): string => $record->completed),

                Forms\Components\Placeholder::make('intent_id')
                    ->content(function ($record) {

                        $questions = config('survey');
                        $question = $questions[0]['question'];
                        $options = $questions[0]['options'];

                        $userInput = 'Some User Input';
                        $stored_intent_classification_prompt = app(PromptSettings::class)
                            ->intent_classification_prompt;

                        return new HtmlString(str_replace(
                            ['{{userInput}}', '{{question}}', '{{options}}'],
                            [$userInput, $question, implode(', ', $options)],
                            $stored_intent_classification_prompt
                        ));
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('session_id'),
                TextColumn::make('survey_type')
                    ->badge()
                    ->label('Type')
                    ->color('info'),
                TextColumn::make('created_at')->sortable()->dateTime(),
                TextColumn::make('updated_at')->sortable()->dateTime(),
                TextColumn::make('completed_at')->sortable()->dateTime(),
                TextColumn::make('completed')->sortable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Yes' : 'No')
                    ->label('Completed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('survey_type')
                    ->options(fn () => SurveySession::distinct()->whereNotNull('survey_type')->pluck('survey_type', 'survey_type')->toArray())
                    ->label('Type'),
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
                            $indicators[] = 'From ' . \Carbon\Carbon::parse($data['from'])->toFormattedDateString();
                        }
                        if ($data['until'] ?? null) {
                            $indicators[] = 'Until ' . \Carbon\Carbon::parse($data['until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
            ])
            ->recordActions([
                EditAction::make()->label('Responses'),
            ])
            ->toolbarActions([
                ExportAction::make()
                    ->exporter(SurveySessionExporter::class),
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->exporter(SurveySessionExporter::class),
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
            'create' => Pages\CreateSurveySession::route('/create'),
            'edit' => Pages\EditSurveySession::route('/{record}/edit'),
        ];
    }
}
