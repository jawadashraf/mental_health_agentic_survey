<?php

namespace App\Filament\Pages;

use App\Settings\PromptSettings;
use BackedEnum;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;

class ManagePrompts extends SettingsPage
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PromptSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                MarkdownEditor::make('intent_classification_prompt')
                    ->required()
                ->columnSpanFull(),
            ]);
    }
}
