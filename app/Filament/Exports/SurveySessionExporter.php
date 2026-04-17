<?php

namespace App\Filament\Exports;

use App\Models\SurveySession;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SurveySessionExporter extends Exporter
{
    protected static ?string $model = SurveySession::class;

    public static function getColumns(): array
    {
        $columns = [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('session_id')
                ->label('Session ID'),
            ExportColumn::make('survey_type')
                ->label('Type'),
            ExportColumn::make('completed')
                ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                ->label('Completed'),
            ExportColumn::make('completed_at')
                ->label('Completed At'),
            ExportColumn::make('created_at')
                ->label('Started At'),
        ];

        $surveyConfig = config('survey', []);

        foreach ($surveyConfig as $question) {
            $questionId = $question['id'];
            $label = $question['label'] ?: (strlen($question['question']) > 50 ? substr($question['question'], 0, 47) . '...' : $question['question']);

            $columns[] = ExportColumn::make("q_{$questionId}")
                ->label($label)
                ->state(function (SurveySession $record) use ($questionId) {
                    return $record->responses->firstWhere('question_id', $questionId)?->response;
                });
        }

        return $columns;
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your survey session export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' were exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
