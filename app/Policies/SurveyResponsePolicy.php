<?php

namespace App\Policies;

use App\Models\SurveyResponse;
use App\Models\User;

class SurveyResponsePolicy
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
    public function view(User $user, SurveyResponse $surveyResponse): bool
    {
        return $user->canAccessSurvey($surveyResponse->surveySession?->survey);
    }

    /**
     * Determine whether the user can mark the flagged response as reviewed.
     */
    public function review(User $user, SurveyResponse $surveyResponse): bool
    {
        return $surveyResponse->is_flagged && $this->view($user, $surveyResponse);
    }

    /**
     * Responses are only created by the survey chat.
     */
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, SurveyResponse $surveyResponse): bool
    {
        return false;
    }

    public function delete(User $user, SurveyResponse $surveyResponse): bool
    {
        return false;
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }
}
