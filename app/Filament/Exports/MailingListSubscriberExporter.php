<?php

namespace App\Filament\Exports;

use App\Models\MailingListSubscriber;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Str;

class MailingListSubscriberExporter extends Exporter
{
    protected static ?string $model = MailingListSubscriber::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('email')
                ->label('Email')
                ->preventFormulaInjection(),
            ExportColumn::make('organization.name')
                ->label('Organisation'),
            ExportColumn::make('created_at')
                ->label('Signed Up At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your mailing list subscriber export has completed and '.Str::of('row')->counted($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Str::of('row')->counted($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
