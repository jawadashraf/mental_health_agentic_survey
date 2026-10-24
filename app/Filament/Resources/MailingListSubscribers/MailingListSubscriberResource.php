<?php

namespace App\Filament\Resources\MailingListSubscribers;

use App\Filament\Exports\MailingListSubscriberExporter;
use App\Filament\Resources\MailingListSubscribers\Pages\ManageMailingListSubscribers;
use App\Models\MailingListSubscriber;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MailingListSubscriberResource extends Resource
{
    protected static ?string $model = MailingListSubscriber::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Mailing List';

    protected static ?string $modelLabel = 'mailing list subscriber';

    protected static ?string $recordTitleAttribute = 'email';

    protected static ?int $navigationSort = 4;

    /**
     * @return Builder<MailingListSubscriber>
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('organization')
            ->visibleTo(auth()->user());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('email')
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('organization.name')
                    ->label('Organisation')
                    ->visible(fn (): bool => auth()->user()->isSuperAdmin()),
                TextColumn::make('created_at')
                    ->label('Signed up')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('organization')
                    ->label('Organisation')
                    ->relationship('organization', 'name')
                    ->visible(fn (): bool => auth()->user()->isSuperAdmin()),
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export to Excel')
                    ->exporter(MailingListSubscriberExporter::class),
            ])
            ->recordActions([
                DeleteAction::make()
                    ->label('Remove'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageMailingListSubscribers::route('/'),
        ];
    }
}
