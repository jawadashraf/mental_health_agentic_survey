<?php

namespace Database\Factories;

use App\Models\MailingListSubscriber;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MailingListSubscriber>
 */
class MailingListSubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
