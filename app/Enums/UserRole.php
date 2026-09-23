<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel
{
    case SuperAdmin = 'super_admin';
    case OrganizationAdmin = 'organization_admin';
    case OrganizationMember = 'organization_member';

    public function getLabel(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::OrganizationAdmin => 'Organisation Admin',
            self::OrganizationMember => 'Organisation Member',
        };
    }

    /**
     * Roles an organisation admin is allowed to assign to their team.
     *
     * @return array<string, string>
     */
    public static function organizationOptions(): array
    {
        return [
            self::OrganizationAdmin->value => self::OrganizationAdmin->getLabel(),
            self::OrganizationMember->value => self::OrganizationMember->getLabel(),
        ];
    }
}
