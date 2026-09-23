<?php

namespace App\Policies;

use App\Models\SurveySession;
use App\Models\User;

class SurveySessionPolicy
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
    public function view(User $user, SurveySession $surveySession): bool
    {
        return $user->canAccessSurvey($surveySession->survey);
    }

    /**
     * Determine whether the user can open the session's responses page.
     */
    public function update(User $user, SurveySession $surveySession): bool
    {
        return $this->view($user, $surveySession);
    }

    /**
     * Sessions are only created by the survey chat.
     */
    public function create(User $user): bool
    {
        return false;
    }

    public function delete(User $user, SurveySession $surveySession): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }
}
