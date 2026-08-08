<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyResponse extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_flagged' => 'boolean',
        'flagged_at' => 'datetime',
    ];

    public function surveySession(): BelongsTo
    {
        return $this->belongsTo(SurveySession::class, 'session_id', 'session_id');
    }

    public function scopeFlagged($query)
    {
        return $query->where('is_flagged', true);
    }

    public function scopeSafeguarding($query)
    {
        return $query->where('is_flagged', true)->where('flag_type', 'safeguarding');
    }
}
