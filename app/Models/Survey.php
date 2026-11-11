<?php

namespace App\Models;

use Database\Factories\SurveyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Survey extends Model
{
    /** @use HasFactory<SurveyFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (Survey $survey): void {
            if (empty($survey->access_code)) {
                $survey->access_code = Str::lower(Str::random(10));
            }
        });
    }

    protected $fillable = [
        'organization_id',
        'name',
        'slug',
        'access_code',
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
     * Get the direct access URL for this survey including its access code.
     */
    public function accessUrl(): string
    {
        $params = ['survey' => $this->slug];

        if ($this->access_code) {
            $params['access_code'] = $this->access_code;
        }

        return route('raft-chat', $params);
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
