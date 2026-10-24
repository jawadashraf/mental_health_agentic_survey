<?php

namespace App\Policies;

use App\Models\MailingListSubscriber;
use App\Models\User;

class MailingListSubscriberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MailingListSubscriber $mailingListSubscriber): bool
    {
        return $user->isSuperAdmin() || $user->belongsToOrganization($mailingListSubscriber->organization_id);
    }

    /**
     * Subscribers only sign up through the survey chat.
     */
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, MailingListSubscriber $mailingListSubscriber): bool
    {
        return false;
    }

    /**
     * Organisation admins may remove their own subscribers, e.g. when someone asks to be taken off the list.
     */
    public function delete(User $user, MailingListSubscriber $mailingListSubscriber): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        return $user->isOrganizationAdmin() && $user->belongsToOrganization($mailingListSubscriber->organization_id);
    }

    public function deleteAny(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isOrganizationAdmin();
    }
}
