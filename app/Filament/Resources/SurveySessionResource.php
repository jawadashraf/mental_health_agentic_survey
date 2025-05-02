<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveySessionResource\Pages;
use App\Filament\Resources\SurveySessionResource\RelationManagers;
use App\Models\SurveySession;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurveySessionResource extends Resource
{
    protected static ?string $model = SurveySession::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
                    ->content(fn ($record): string => $record->completed_at->toFormattedDateString()),
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
                TextColumn::make('created_at')->sortable()->dateTime(),
                TextColumn::make('updated_at')->sortable()->dateTime(),
                TextColumn::make('completed_at')->sortable()->dateTime(),
                TextColumn::make('completed')->sortable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Yes' : 'No' )
                    ->label('Completed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Responses'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
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
            'create' => Pages\CreateSurveySession::route('/create'),
            'edit' => Pages\EditSurveySession::route('/{record}/edit'),
        ];
    }
}
