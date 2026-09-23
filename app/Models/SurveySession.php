<?php

namespace App\Models;

use Database\Factories\SurveySessionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveySession extends Model
{
    /** @use HasFactory<SurveySessionFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'has_flags' => 'boolean',
        'completed' => 'boolean',
    ];

    /**
     * @return BelongsTo<Survey, $this>
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function responses(): HasMany
    {
        return $this->hasMany(SurveyResponse::class, 'session_id', 'session_id');
    }

    public function intents(): HasMany
    {
        return $this->hasMany(Intent::class, 'session_id', 'session_id');
    }

    public function scopeFlagged($query)
    {
        return $query->where('has_flags', true);
    }

    /**
     * Limit the query to sessions of surveys the given user may see.
     *
     * @param  Builder<SurveySession>  $query
     */
    public function scopeVisibleTo(Builder $query, User $user): void
    {
        if ($user->isSuperAdmin()) {
            return;
        }

        $query->whereHas('survey', fn (Builder $survey) => $survey->visibleTo($user));
    }
}
