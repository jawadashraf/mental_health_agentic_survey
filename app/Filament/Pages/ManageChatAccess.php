<?php

namespace App\Filament\Pages;

use App\Settings\ChatSettings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class ManageChatAccess extends SettingsPage
{
    protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedKey;

    protected static ?string $navigationLabel = 'Chat Access & QR Code';

    protected static ?string $title = 'Chat Access & Survey Disclaimer';

    protected static ?int $navigationSort = 3;

    protected static string $settings = ChatSettings::class;

    public static function canAccess(): bool
    {
        return auth()->user()?->isSuperAdmin() || auth()->user()?->isOrganizationAdmin();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Survey Access Security & Password')
                    ->description('Set or generate the password / secret code required to unlock the survey chat.')
                    ->icon(Heroicon::OutlinedLockClosed)
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('access_code')
                                ->label('Chat Access Password / Secret')
                                ->required()
                                ->maxLength(64)
                                ->helperText('Survey participants must enter this code or use a generated QR code to access the survey.')
                                ->suffixAction(
                                    Action::make('generateSecret')
                                        ->icon(Heroicon::OutlinedSparkles)
                                        ->tooltip('Generate random secret')
                                        ->action(function (Set $set): void {
                                            $newSecret = Str::lower(Str::random(10));
                                            $set('access_code', $newSecret);
                                            Notification::make()
                                                ->title('Generated random secret!')
                                                ->body("New secret: {$newSecret}. Click Save to persist.")
                                                ->warning()
                                                ->send();
                                        })
                                ),
                            Toggle::make('require_disclaimer')
                                ->label('Require disclaimer acknowledgment before starting survey')
                                ->helperText('Users will see an explicit AI Trial Disclaimer modal that they must accept before chatting.')
                                ->default(true),
                        ]),
                    ]),

                Section::make('Survey Access QR Code & Direct Sharing')
                    ->description('Generate a scannable QR code and direct links to share with participants via email, messaging, printouts, or flyers.')
                    ->icon(Heroicon::OutlinedQrCode)
                    ->schema([
                        Placeholder::make('qr_preview')
                            ->hiddenLabel()
                            ->content(fn (): HtmlString => new HtmlString(
                                view('filament.pages.chat-access-qr', [
                                    'code' => app(ChatSettings::class)->access_code,
                                ])->render()
                            )),
                    ]),

                Section::make('AI Trial Disclaimer & In-Chat Privacy Notice')
                    ->description('Configure the disclaimer text and privacy warning shown to users starting a survey.')
                    ->icon(Heroicon::OutlinedShieldExclamation)
                    ->schema([
                        TextInput::make('privacy_notice')
                            ->label('In-Chat Privacy Notice / Warning')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Prominently displayed above the chat message input box and on the survey access screen.'),
                        TextInput::make('disclaimer_title')
                            ->label('Disclaimer Modal Title')
                            ->required()
                            ->maxLength(120),
                        Textarea::make('disclaimer_content')
                            ->label('Disclaimer Content')
                            ->required()
                            ->rows(12)
                            ->helperText('Full legal / project disclaimer text shown when users start the survey.'),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generateRandomSecret')
                ->label('Generate Random Secret')
                ->icon(Heroicon::OutlinedSparkles)
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Generate New Random Access Secret')
                ->modalDescription('This will immediately update and save a new random secret code for the chat. Any previously shared links or printed QR codes with the old code will no longer work.')
                ->action(function (): void {
                    $newSecret = Str::lower(Str::random(10));

                    $settings = app(ChatSettings::class);
                    $settings->access_code = $newSecret;
                    $settings->save();

                    $this->fillForm();

                    Notification::make()
                        ->title('New random secret generated and saved!')
                        ->body("Active chat secret: {$newSecret}")
                        ->success()
                        ->persistent()
                        ->send();
                }),

            Action::make('shareQrCode')
                ->label('Share QR Code')
                ->icon(Heroicon::OutlinedQrCode)
                ->color('success')
                ->modalHeading('Survey Access QR Code & Direct Links')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->modalContent(fn (): HtmlString => new HtmlString(
                    view('filament.pages.chat-access-qr', [
                        'code' => app(ChatSettings::class)->access_code,
                    ])->render()
                )),
        ];
    }
}
