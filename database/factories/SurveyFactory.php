<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'organization_id' => Organization::factory(),
            'name' => Str::title($name),
            'slug' => Str::slug($name).'-'.Str::lower(Str::random(5)),
            'config_key' => 'raft-survey-test',
            'is_active' => true,
            'safeguarding_emails' => [],
            'info_emails' => [],
        ];
    }

    /**
     * @param  list<string>  $safeguardingEmails
     * @param  list<string>  $infoEmails
     */
    public function withAlertEmails(array $safeguardingEmails = [], array $infoEmails = []): static
    {
        return $this->state(fn (array $attributes) => [
            'safeguarding_emails' => $safeguardingEmails,
            'info_emails' => $infoEmails,
        ]);
    }
}
