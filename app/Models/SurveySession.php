<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveySession extends Model
{
    //

    protected $guarded = [];

    public function responses(): HasMany
    {
        return $this->hasMany(SurveyResponse::class, 'session_id', 'session_id');
    }

    public function intents(): HasMany
    {
        return $this->hasMany(Intent::class, 'session_id', 'session_id');
    }
}
