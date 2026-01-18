<?php

namespace App\Filament\Resources\SurveySessionResource\Pages;

use App\Filament\Resources\SurveySessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSurveySession extends EditRecord
{
    protected static string $resource = SurveySessionResource::class;
    protected ?string $heading = 'Survey Session';

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
        ];
    }
}
