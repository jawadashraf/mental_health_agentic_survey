<?php

namespace Database\Factories;

use App\Models\SurveyResponse;
use App\Models\SurveySession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SurveyResponse>
 */
class SurveyResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_id' => fn () => SurveySession::factory()->create()->session_id,
            'question_id' => fake()->numberBetween(1, 12),
            'question' => fake()->sentence().'?',
            'response' => fake()->sentence(),
            'is_flagged' => false,
        ];
    }

    public function forSession(SurveySession $session): static
    {
        return $this->state(fn (array $attributes) => [
            'session_id' => $session->session_id,
        ]);
    }

    public function flagged(string $type = 'safeguarding', string $severity = 'critical'): static
    {
        return $this->state(fn (array $attributes) => [
            'is_flagged' => true,
            'flag_type' => $type,
            'flag_severity' => $severity,
            'flag_reason' => fake()->sentence(),
            'flagged_at' => now(),
        ]);
    }
}
