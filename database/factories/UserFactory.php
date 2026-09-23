<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => UserRole::OrganizationMember,
            'receives_flag_alerts' => true,
        ];
    }

    public function superAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::SuperAdmin,
            'organization_id' => null,
        ]);
    }

    public function organizationAdmin(?Organization $organization = null): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::OrganizationAdmin,
            'organization_id' => $organization ?? Organization::factory(),
        ]);
    }

    public function organizationMember(?Organization $organization = null): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::OrganizationMember,
            'organization_id' => $organization ?? Organization::factory(),
        ]);
    }

    public function withoutFlagAlerts(): static
    {
        return $this->state(fn (array $attributes) => [
            'receives_flag_alerts' => false,
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
