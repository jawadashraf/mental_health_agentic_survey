<?php

namespace App\Models;

use Database\Factories\SurveyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    /** @use HasFactory<SurveyFactory> */
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'name',
        'slug',
        'config_key',
        'is_active',
        'safeguarding_emails',
        'info_emails',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'organization_id' => 'integer',
            'is_active' => 'boolean',
            'safeguarding_emails' => 'array',
            'info_emails' => 'array',
        ];
    }

    /**
     * @return BelongsTo<Organization, $this>
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * @return HasMany<SurveySession, $this>
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(SurveySession::class);
    }

    /**
     * The survey's questions, defined in its config file.
     *
     * @return array<int, array<string, mixed>>
     */
    public function questions(): array
    {
        return config($this->config_key, []);
    }

    /**
     * Limit the query to surveys the given user may see.
     *
     * @param  Builder<Survey>  $query
     */
    public function scopeVisibleTo(Builder $query, User $user): void
    {
        if ($user->isSuperAdmin()) {
            return;
        }

        $query->where('organization_id', $user->organization_id ?? 0);
    }
}
