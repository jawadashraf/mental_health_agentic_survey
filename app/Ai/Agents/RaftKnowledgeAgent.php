<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Promptable;
use Stringable;

class RaftKnowledgeAgent implements Agent
{
    use Promptable;

    public function __construct(
        protected string $retrievedContext = ''
    ) {}

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<INSTRUCTIONS
You are the official Knowledge & Policy Assistant for The Raft.
You MUST answer user questions STRICTLY using ONLY the context provided below.

CONTEXT FROM THE RAFT DOCUMENTS:
---
{$this->retrievedContext}
---

STRICT RULES:
1. Answer using ONLY the facts explicitly mentioned in the CONTEXT above.
2. If the context contains specific named values, principles, or lists (e.g. core values), present them as a clear bulleted list using their exact names from the document.
3. Do NOT use outside knowledge, speculation, or assumptions.
4. If the context does not contain enough information to answer the question, state: "I'm sorry, but that information is not available in The Raft's official policy, strategy, or constitution documents."
INSTRUCTIONS;
    }
}
