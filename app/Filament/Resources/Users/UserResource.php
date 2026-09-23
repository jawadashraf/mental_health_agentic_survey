<?php

namespace App\Filament\Resources\Users;

use App\Enums\UserRole;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use STS\FilamentImpersonate\Actions\Impersonate;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static string|UnitEnum|null $navigationGroup = 'Administration';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return Builder<User>
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
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Select::make('role')
                    ->options(fn (): array => $isSuperAdmin()
                        ? collect(UserRole::cases())->mapWithKeys(fn (UserRole $role): array => [$role->value => $role->getLabel()])->all()
                        : UserRole::organizationOptions())
                    ->default(UserRole::OrganizationMember->value)
                    ->required()
                    ->live(),
                Select::make('organization_id')
                    ->label('Organisation')
                    ->relationship('organization', 'name')
                    ->searchable()
                    ->preload()
                    ->required(fn (Get $get): bool => ! in_array($get('role'), [UserRole::SuperAdmin, UserRole::SuperAdmin->value], true))
                    ->visible($isSuperAdmin),
                Toggle::make('receives_flag_alerts')
                    ->label('Receive flag alert emails')
                    ->helperText('Email this user when a response on one of their organisation\'s surveys is flagged.')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('organization.name')
                    ->label('Organisation')
                    ->placeholder('-')
                    ->visible(fn (): bool => auth()->user()?->isSuperAdmin() ?? false),
                TextColumn::make('role')
                    ->badge(),
                IconColumn::make('receives_flag_alerts')
                    ->label('Flag alerts')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('organization')
                    ->label('Organisation')
                    ->relationship('organization', 'name')
                    ->visible(fn (): bool => auth()->user()?->isSuperAdmin() ?? false),
                SelectFilter::make('role')
                    ->options(UserRole::class),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                Impersonate::make()
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
