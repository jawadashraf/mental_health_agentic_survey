<?php

namespace App\Filament\Resources\FlaggedResponses\Pages;

use App\Filament\Resources\FlaggedResponses\FlaggedResponseResource;
use Filament\Resources\Pages\ListRecords;

class ListFlaggedResponses extends ListRecords
{
    protected static string $resource = FlaggedResponseResource::class;
}
