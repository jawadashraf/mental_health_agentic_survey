<?php

namespace App\Filament\Resources\SurveySessionResource\Pages;

use App\Filament\Resources\SurveySessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSurveySessions extends ListRecords
{
    protected static string $resource = SurveySessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
