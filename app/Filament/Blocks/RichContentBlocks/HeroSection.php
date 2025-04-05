<?php

namespace App\Filament\Blocks\RichContentBlocks;
use App\Filament\Blocks\BaseBlock;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;

class HeroSection extends BaseBlock
{
    static function schema(Form $form)
    {
        return [
            Forms\Components\Select::make('background')->options([
                'black' => 'Black',
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'white' => 'White',
            ]),
            FileUpload::make('hero_image')->image(),
            Forms\Components\TextInput::make('hero_title'),
            Forms\Components\RichEditor::make('hero_content'),
            Forms\Components\Repeater::make('buttons')->schema([
                Forms\Components\TextInput::make('label'),
                Forms\Components\TextInput::make('url'),
                Forms\Components\TextInput::make('variant'),
            ]),
        ];
    }
}
