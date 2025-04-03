<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'radio' => 'Radio',
                        'checkbox' => 'Checkbox',
                        'text' => 'Text',
                        'textarea' => 'Text Area',
                    ])
                    ->required(),

                Forms\Components\Select::make('category')
                    ->options([
                        'demographic' => 'Demographic',
                        'knowledge' => 'Knowledge',
                        'attitude' => 'Attitude',
                        'behavior' => 'Behavior',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('question')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('options')
                    ->schema([
                        Forms\Components\TextInput::make('option')
                            ->required(),
                    ])
                    ->addable(true)
                    ->deletable(true)
                    ->reorderable(true)
                    ->columnSpanFull()
                    ->visible(fn (Forms\Get $get) => in_array($get('type'), ['radio', 'checkbox']))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'radio' => 'info',
                        'checkbox' => 'success',
                        'text' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'demographic' => 'primary',
                        'knowledge' => 'success',
                        'attitude' => 'warning',
                        default => 'gray',
                    }),

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
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'radio' => 'Radio',
                        'checkbox' => 'Checkbox',
                        'text' => 'Text',
                        'textarea' => 'Text Area',
                    ]),

                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'demographic' => 'Demographic',
                        'knowledge' => 'Knowledge',
                        'attitude' => 'Attitude',
                        'behavior' => 'Behavior',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
