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

        $surveys = [
            'survey' => config('survey', []),
            'raft' => config('raft-survey', []),
            'raft-test' => config('raft-survey-test', []),
            'mini' => config('survey_mini', []),
        ];

        foreach ($surveys as $type => $questions) {
            foreach ($questions as $question) {
                $questionId = $question['id'];
                $label = ($question['label'] ?? null) ?: (strlen($question['question']) > 50 ? substr($question['question'], 0, 47).'...' : $question['question']);

                // Prefix label with survey type for clarity in column selection
                $prefixedLabel = match ($type) {
                    'survey' => "Standard: {$label}",
                    'raft' => "Raft: {$label}",
                    'raft-test' => "Raft Test: {$label}",
                    'mini' => "Mini: {$label}",
                    default => "{$type}: {$label}",
                };

                $columns[] = ExportColumn::make("{$type}_q_{$questionId}")
                    ->label($prefixedLabel)
                    ->state(function (SurveySession $record) use ($type, $questionId) {
                        $recordType = $record->survey_type ?: 'survey';

                        if ($recordType !== $type) {
                            return null;
                        }

                        return $record->responses->firstWhere('question_id', $questionId)?->response;
                    })
                    ->enabledByDefault(function () use ($type) {
                        // If a specific survey type is filtered, only enable those columns by default
                        $surveyType = request()->input('tableFilters.survey_type.value');

                        if (! $surveyType) {
                            return $type === 'survey'; // Default to standard if no filter
                        }

                        return $surveyType === $type;
                    });
            }
        }

        return $columns;
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your survey session export has completed and '.number_format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' were exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
