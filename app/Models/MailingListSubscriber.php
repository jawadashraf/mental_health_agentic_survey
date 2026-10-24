<?php

namespace App\Models;

use Database\Factories\MailingListSubscriberFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * An email address left at the end of a survey to hear from the organisation.
 *
 * Deliberately not linked to a survey session, so sign-ups can't be traced back to answers.
 */
class MailingListSubscriber extends Model
{
    /** @use HasFactory<MailingListSubscriberFactory> */
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'email',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
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

    /**
     * Limit the query to subscribers of organisations the given user may see.
     *
     * @param  Builder<MailingListSubscriber>  $query
     */
    public function scopeVisibleTo(Builder $query, User $user): void
    {
        if ($user->isSuperAdmin()) {
            return;
        }

        $query->where('organization_id', $user->organization_id ?? 0);
    }
}
