<?php

namespace App\Models;

use Database\Factories\SurveyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Survey extends Model
{
    /** @use HasFactory<SurveyFactory> */
    use HasFactory;

    public const string DEFAULT_BRAND_COLOR = '#0D9488';

    public const string DEFAULT_WELCOME_MESSAGE = 'Thank you for taking a few minutes to share your experiences as a family or carer. Your responses are completely anonymous and help improve support services for families like yours.';

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
        'logo_path',
        'brand_color',
        'welcome_title',
        'welcome_message',
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
     * Get the survey URL that asks participants to type the access code manually.
     */
    public function manualAccessUrl(): string
    {
        return route('raft-chat', ['survey' => $this->slug]);
    }

    /**
     * Public URL for the uploaded survey logo, if any.
     */
    public function logoUrl(): ?string
    {
        if (empty($this->logo_path)) {
            return null;
        }

        return Storage::disk('public')->url($this->logo_path);
    }

    /**
     * The primary brand colour for this survey's welcome screen and chat accents.
     */
    public function effectiveBrandColor(): string
    {
        return $this->brand_color ?: self::DEFAULT_BRAND_COLOR;
    }

    /**
     * The welcome screen headline for this survey.
     */
    public function effectiveWelcomeTitle(): string
    {
        return $this->welcome_title ?: "Welcome to {$this->name}";
    }

    /**
     * The welcome screen invitation message for this survey.
     */
    public function effectiveWelcomeMessage(): string
    {
        return $this->welcome_message ?: self::DEFAULT_WELCOME_MESSAGE;
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
