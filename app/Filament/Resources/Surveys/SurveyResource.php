<?php

namespace App\Filament\Resources\Surveys;

use App\Filament\Resources\Surveys\Pages\CreateSurvey;
use App\Filament\Resources\Surveys\Pages\EditSurvey;
use App\Filament\Resources\Surveys\Pages\ListSurveys;
use App\Models\Survey;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    /**
     * Config files that hold survey questions.
     *
     * @var array<string, string>
     */
    public const array QuestionSets = [
        'raft-survey' => 'Raft survey (config/raft-survey.php)',
        'raft-survey-test' => 'Raft test survey (config/raft-survey-test.php)',
        'survey' => 'Standard survey (config/survey.php)',
        'survey_mini' => 'Mini survey (config/survey_mini.php)',
    ];

    /**
     * @return Builder<Survey>
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('organization')
            ->visibleTo(auth()->user());
    }

    public static function form(Schema $schema): Schema
    {
        $isSuperAdmin = fn (): bool => auth()->user()?->isSuperAdmin() ?? false;

        return $schema
            ->components([
                Section::make('Survey')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! $isSuperAdmin()),
                        Select::make('organization_id')
                            ->label('Organisation')
                            ->relationship('organization', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->visible($isSuperAdmin),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->alphaDash()
                            ->unique(ignoreRecord: true)
                            ->helperText('Links chat sessions to this survey, e.g. "raft".')
                            ->visible($isSuperAdmin),
                        Select::make('config_key')
                            ->label('Question set')
                            ->options(self::QuestionSets)
                            ->required()
                            ->visible($isSuperAdmin),
                        Toggle::make('is_active')
                            ->default(true)
                            ->visible($isSuperAdmin),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Survey Access & Security')
                    ->description('The secret code / password participants use to enter this survey. Organisation admins can change this code or generate a random secret.')
                    ->schema([
                        TextInput::make('access_code')
                            ->label('Access Password / Secret')
                            ->required()
                            ->maxLength(64)
                            ->unique(ignoreRecord: true)
                            ->helperText('Participants entering this code or scanning this survey\'s QR code enter this survey directly.')
                            ->suffixAction(
                                Action::make('generateSecret')
                                    ->icon(Heroicon::OutlinedSparkles)
                                    ->tooltip('Generate random secret')
                                    ->action(function (Set $set): void {
                                        $newCode = Str::lower(Str::random(10));
                                        $set('access_code', $newCode);
                                        Notification::make()
                                            ->title('Generated random code')
                                            ->body("New code: {$newCode}. Click Save to persist.")
                                            ->warning()
                                            ->send();
                                    })
                            ),
                    ])
                    ->columnSpanFull(),
                Section::make('Flag alert recipients')
                    ->description('Who is emailed when a response is flagged. Organisation users who opted in to flag alerts are also emailed. The first address in each list is also shared with participants when they are signposted for support.')
                    ->schema([
                        TagsInput::make('safeguarding_emails')
                            ->label('Safeguarding / critical alerts')
                            ->placeholder('Add email address')
                            ->nestedRecursiveRules(['email']),
                        TagsInput::make('info_emails')
                            ->label('Accessibility & event safety alerts')
                            ->placeholder('Add email address')
                            ->nestedRecursiveRules(['email']),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('organization.name')
                    ->label('Organisation')
                    ->sortable()
                    ->visible(fn (): bool => auth()->user()?->isSuperAdmin() ?? false),
                TextColumn::make('slug')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('access_code')
                    ->label('Access Code')
                    ->badge()
                    ->color('primary')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('sessions_count')
                    ->counts('sessions')
                    ->label('Sessions'),
                TextColumn::make('safeguarding_emails')
                    ->label('Safeguarding recipients')
                    ->badge()
                    ->placeholder('Default'),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('organization')
                    ->label('Organisation')
                    ->relationship('organization', 'name')
                    ->visible(fn (): bool => auth()->user()?->isSuperAdmin() ?? false),
            ])
            ->recordActions([
                Action::make('accessQrCode')
                    ->label('Access QR Code')
                    ->icon(Heroicon::OutlinedQrCode)
                    ->color('info')
                    ->modalHeading(fn (Survey $record): string => "Survey Access QR Code: {$record->name}")
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close')
                    ->modalContent(fn (Survey $record): HtmlString => new HtmlString(
                        view('filament.pages.survey-qr-modal', [
                            'survey' => $record,
                        ])->render()
                    )),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSurveys::route('/'),
            'create' => CreateSurvey::route('/create'),
            'edit' => EditSurvey::route('/{record}/edit'),
        ];
    }
}
