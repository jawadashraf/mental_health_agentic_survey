<?php

namespace App\Models;

use Database\Factories\SurveyResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyResponse extends Model
{
    /** @use HasFactory<SurveyResponseFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_flagged' => 'boolean',
        'flagged_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    public function surveySession(): BelongsTo
    {
        return $this->belongsTo(SurveySession::class, 'session_id', 'session_id');
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function scopeFlagged($query)
    {
        return $query->where('is_flagged', true);
    }

    public function scopeSafeguarding($query)
    {
        return $query->where('is_flagged', true)->where('flag_type', 'safeguarding');
    }

    /**
     * Limit the query to responses of surveys the given user may see.
     *
     * @param  Builder<SurveyResponse>  $query
     */
    public function scopeVisibleTo(Builder $query, User $user): void
    {
        if ($user->isSuperAdmin()) {
            return;
        }

        $query->whereHas('surveySession', fn (Builder $session) => $session->visibleTo($user));
    }

    public function isReviewed(): bool
    {
        return $this->reviewed_at !== null;
    }

    public function markReviewed(User $reviewer, ?string $notes = null): void
    {
        $this->update([
            'reviewed_by' => $reviewer->id,
            'reviewed_at' => now(),
            'review_notes' => $notes,
        ]);
    }
}
