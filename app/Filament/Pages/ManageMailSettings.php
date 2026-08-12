<?php

namespace App\Filament\Pages;

use App\Mail\SafeguardingAlertMail;
use App\Settings\MailSettings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use Throwable;

class ManageMailSettings extends SettingsPage
{
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Email Settings';

    protected static ?string $title = 'Email Settings & Background Queue';

    protected static string $settings = MailSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('SMTP & Mail Server Settings')
                    ->description('Configure your outbound SMTP / Mailer server credentials.')
                    ->icon('heroicon-o-server')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('mailer')
                                ->options([
                                    'smtp' => 'SMTP',
                                    'log' => 'Log (Local Testing)',
                                    'sendmail' => 'Sendmail',
                                    'mailgun' => 'Mailgun',
                                    'ses' => 'Amazon SES',
                                    'postmark' => 'Postmark',
                                ])
                                ->required(),
                            TextInput::make('host')
                                ->label('SMTP Host')
                                ->placeholder('smtp.mailtrap.io or 127.0.0.1'),
                            TextInput::make('port')
                                ->numeric()
                                ->label('SMTP Port')
                                ->placeholder('587 or 2525'),
                            Select::make('encryption')
                                ->options([
                                    'tls' => 'TLS',
                                    'ssl' => 'SSL',
                                    'none' => 'None',
                                ])
                                ->nullable(),
                            TextInput::make('username')
                                ->label('SMTP Username'),
                            TextInput::make('password')
                                ->password()
                                ->revealable()
                                ->label('SMTP Password'),
                            TextInput::make('from_address')
                                ->email()
                                ->required()
                                ->label('Default From Email Address'),
                            TextInput::make('from_name')
                                ->required()
                                ->label('Default From Sender Name'),
                        ]),
                    ]),

                Section::make('Alert Recipients & Background Queue Settings')
                    ->description('Configure recipient email addresses for survey alerts and control background execution.')
                    ->icon('heroicon-o-bell')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('safeguarding_recipient_email')
                                ->email()
                                ->required()
                                ->label('Safeguarding Alert Email Recipient')
                                ->helperText('Receives critical and safeguarding survey response alerts.'),
                            TextInput::make('info_recipient_email')
                                ->email()
                                ->required()
                                ->label('General / Safety Email Recipient')
                                ->helperText('Receives general accessibility and event safety alerts.'),
                            Toggle::make('enable_background_queue')
                                ->label('Queue Email Notifications in Background')
                                ->helperText('Send emails asynchronously using database queue workers without delaying user chat responses.')
                                ->columnSpanFull(),
                        ]),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('previewEmail')
                ->label('Preview Alert Email')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->modalHeading('Safeguarding Email Notification Preview')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close Preview')
                ->schema([
                    Select::make('severity')
                        ->options([
                            'critical' => 'Critical',
                            'high' => 'High',
                            'medium' => 'Medium',
                            'low' => 'Low',
                        ])
                        ->default('critical')
                        ->live(),
                    TextInput::make('flag_type')
                        ->default('safeguarding')
                        ->required()
                        ->live(),
                    TextInput::make('flag_reason')
                        ->default('Severe emotional distress or suicidal ideation mentioned.')
                        ->required()
                        ->live(),
                    TextInput::make('user_response')
                        ->default('I am feeling deeply overwhelmed and need immediate support.')
                        ->required()
                        ->live(),
                ])
                ->modalContent(function (array $data): HtmlString {
                    $mailable = new SafeguardingAlertMail(
                        sessionId: 'SESS-PREVIEW-9982',
                        questionId: 1,
                        questionText: 'How are you coping with your caring responsibilities today?',
                        userResponse: $data['user_response'] ?? 'I am feeling deeply overwhelmed and need immediate support.',
                        flagType: $data['flag_type'] ?? 'safeguarding',
                        flagSeverity: $data['severity'] ?? 'critical',
                        flagReason: $data['flag_reason'] ?? 'Severe emotional distress or suicidal ideation mentioned.',
                        recipientEmail: app(MailSettings::class)->safeguarding_recipient_email ?? 'jawadashraf78@gmail.com'
                    );

                    return new HtmlString('
                        <div style="background: #ffffff; padding: 20px; border: 1px solid #cbd5e1; border-radius: 8px; color: #0f172a;">
                            '.$mailable->render().'
                        </div>
                    ');
                }),

            Action::make('sendTestEmail')
                ->label('Send Test Email')
                ->icon('heroicon-o-paper-airplane')
                ->color('success')
                ->schema([
                    TextInput::make('test_recipient')
                        ->email()
                        ->required()
                        ->default(fn () => app(MailSettings::class)->safeguarding_recipient_email ?? 'jawadashraf78@gmail.com')
                        ->label('Test Recipient Address'),
                ])
                ->action(function (array $data): void {
                    try {
                        $mailSettings = app(MailSettings::class);

                        config([
                            'mail.default' => $mailSettings->mailer ?? 'smtp',
                            'mail.mailers.smtp.host' => $mailSettings->host ?? '127.0.0.1',
                            'mail.mailers.smtp.port' => $mailSettings->port ?? 2525,
                            'mail.mailers.smtp.username' => $mailSettings->username,
                            'mail.mailers.smtp.password' => $mailSettings->password,
                            'mail.mailers.smtp.encryption' => $mailSettings->encryption === 'none' ? null : $mailSettings->encryption,
                            'mail.from.address' => $mailSettings->from_address ?? 'hello@example.com',
                            'mail.from.name' => $mailSettings->from_name ?? 'Scope AI Safeguarding',
                        ]);

                        Mail::to($data['test_recipient'])->send(new SafeguardingAlertMail(
                            sessionId: 'TEST-SESSION-0001',
                            questionId: 99,
                            questionText: 'Test Email Connection Question',
                            userResponse: 'This is a test email notification sent from Scope AI Admin Settings.',
                            flagType: 'test_notification',
                            flagSeverity: 'info',
                            flagReason: 'Manual Test Email Triggered by Administrator',
                            recipientEmail: $data['test_recipient']
                        ));

                        Notification::make()
                            ->title('Test email sent successfully!')
                            ->body("A test email was sent to {$data['test_recipient']}.")
                            ->success()
                            ->send();
                    } catch (Throwable $e) {
                        Notification::make()
                            ->title('Failed to send test email')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
