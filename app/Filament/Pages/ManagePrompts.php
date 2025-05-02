<?php

namespace App\Filament\Pages;

use App\Settings\PromptSettings;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManagePrompts extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PromptSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Richeditor::make('intent_classification_prompt')
                    ->required()
                ->columnSpanFull(),
            ]);
    }
}
