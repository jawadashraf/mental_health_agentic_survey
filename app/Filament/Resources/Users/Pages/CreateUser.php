<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Auth\Notifications\ResetPassword;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        /** @var User $creator */
        $creator = auth()->user();

        if (! $creator->isSuperAdmin()) {
            $data['organization_id'] = $creator->organization_id;
        }

        $data['password'] = Str::password(32);

        return $data;
    }

    /**
     * Invite the new user by emailing them a link to set their own password.
     */
    protected function afterCreate(): void
    {
        /** @var User $user */
        $user = $this->getRecord();

        $token = Password::broker(Filament::getAuthPasswordBroker())->createToken($user);

        $notification = new ResetPassword($token);
        $notification->url = Filament::getResetPasswordUrl($token, $user);

        $user->notify($notification);
    }
}
