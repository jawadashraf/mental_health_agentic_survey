<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'organization_id',
        'role',
        'receives_flag_alerts',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'receives_flag_alerts' => 'boolean',
            'organization_id' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Organization, $this>
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isSuperAdmin() || $this->organization_id !== null;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === UserRole::SuperAdmin;
    }

    public function isOrganizationAdmin(): bool
    {
        return $this->role === UserRole::OrganizationAdmin && $this->organization_id !== null;
    }

    public function belongsToOrganization(?int $organizationId): bool
    {
        return $organizationId !== null && $this->organization_id === $organizationId;
    }

    public function canAccessSurvey(?Survey $survey): bool
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        return $survey !== null && $this->belongsToOrganization($survey->organization_id);
    }

    /**
     * @param  Builder<User>  $query
     */
    public function scopeReceivingFlagAlerts(Builder $query): void
    {
        $query->where('receives_flag_alerts', true);
    }

    /**
     * Limit the query to users the given user may manage.
     *
     * @param  Builder<User>  $query
     */
    public function scopeVisibleTo(Builder $query, User $user): void
    {
        if ($user->isSuperAdmin()) {
            return;
        }

        $query->where('organization_id', $user->organization_id ?? 0);
    }
}
