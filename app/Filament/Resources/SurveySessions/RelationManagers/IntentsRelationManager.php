<?php

namespace App\Filament\Resources\SurveySessions\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class IntentsRelationManager extends RelationManager
{
    protected static string $relationship = 'intents';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                //                Forms\Components\TextInput::make('title')
                //                    ->required()
                //                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('question_id'),
                Tables\Columns\TextColumn::make('question')->wrap(),
                Tables\Columns\TextColumn::make('intent'),
                Tables\Columns\TextColumn::make('prompt')->wrap(),
                Tables\Columns\TextColumn::make('created_at'),
                Tables\Columns\TextColumn::make('updated_at'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //                Tables\Actions\CreateAction::make(),
            ])
            ->recordActions([
                //                Tables\Actions\EditAction::make(),
                //                Tables\Actions\DeleteAction::make(),
            ])
            ->toolbarActions([

            ]);
    }
}
