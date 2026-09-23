<?php

namespace Database\Factories;

use App\Models\Survey;
use App\Models\SurveySession;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SurveySession>
 */
class SurveySessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'survey_id' => Survey::factory(),
            'session_id' => Str::random(40),
            'survey_type' => fn (array $attributes) => Survey::find($attributes['survey_id'])?->slug,
            'completed' => false,
            'has_flags' => false,
            'flag_count' => 0,
        ];
    }
}
