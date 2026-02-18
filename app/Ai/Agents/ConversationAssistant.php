<?php

namespace App\Ai\Agents;

use Laravel\Ai\Concerns\RemembersConversations;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Promptable;
use Stringable;

class ConversationAssistant implements Agent, Conversational
{
    use Promptable, RemembersConversations;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<'EOT'
        You are a friendly and helpful AI assistant.
        Your goal is to have a natural conversation with the user.
        Remember previous details the user has shared with you.
        Keep your responses concise and engaging.
        EOT;
    }
}
