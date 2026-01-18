<?php

namespace App\Filament\Resources\SurveySessions\Pages;

use App\Filament\Resources\SurveySessions\SurveySessionResource;
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
