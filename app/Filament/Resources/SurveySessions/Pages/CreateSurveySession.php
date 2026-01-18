<?php

namespace App\Filament\Resources\SurveySessions\Pages;

use App\Filament\Resources\SurveySessions\SurveySessionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSurveySession extends CreateRecord
{
    protected static string $resource = SurveySessionResource::class;
}
