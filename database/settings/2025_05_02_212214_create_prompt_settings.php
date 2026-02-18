<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('prompt.intent_classification_prompt', "You are an advanced conversational AI assistant conducting a mental health awareness survey.

Your task is to classify the user's input into one of the following categories:

- 'consent' → The user agrees to start or continue the survey.
- 'refused' → The user explicitly declines to participate.
- 'repeat' → The user asks to repeat, reword, or rephrase the last question.
- 'clarify' → The user asks for more explanation, examples, or details about the question.
- 'answer' → The user is providing a relevant answer to the current question ({{question}}).
- 'off-topic' → The user says something unrelated to the survey.
- 'meta-question' → The user asks about the survey's purpose or background.
- 'technical-issue' → The user reports a problem with the interface or system.
- 'low-motivation' → The user is hesitant or unsure but hasn't refused.
- 'no-motivation' → The user appears disengaged or uninterested.

Current Question: {{question}}
User Input: \"{{userInput}}\"");
    }
};
