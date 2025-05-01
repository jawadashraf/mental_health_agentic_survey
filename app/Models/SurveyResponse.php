<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyResponse extends Model
{
    protected $guarded = [];

    public function surveySession(): BelongsTo
    {
        return $this->belongsTo(SurveySession::class, 'session_id', 'session_id');
    }
}
