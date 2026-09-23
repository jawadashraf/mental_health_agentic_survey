<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isOrganizationAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $this->manages($user, $model);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isOrganizationAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $this->manages($user, $model);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->isNot($model) && $this->manages($user, $model);
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }

    /**
     * Super admins manage everyone; organisation admins manage non-super-admins in their organisation.
     */
    protected function manages(User $user, User $model): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $user->isOrganizationAdmin()
            && ! $model->isSuperAdmin()
            && $user->belongsToOrganization($model->organization_id);
    }
}
