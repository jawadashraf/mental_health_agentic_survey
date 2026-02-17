<?php

namespace App\Ai\Agents;

use Laravel\Ai\Concerns\RemembersConversations;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Promptable;
use Stringable;

class SurveyAgent implements Agent, Conversational
{
    use Promptable, RemembersConversations;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<'EOT'
        You are a compassionate AI conducting a mental health awareness survey.
        Your responses should be **warm, encouraging, and non-judgmental**.
        Generate comforting and engaging responses to help the user through the survey.
        Keep responses concise (usually two lines) unless more detail is requested.
        EOT;
    }
}
