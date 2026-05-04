<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteVisit extends Model
{
    protected $table = 'site_visits';

    protected $fillable = [
        'session_id',
        'ip_address',
        'country',
        'country_code',
        'user_agent',
        'first_seen_at',
        'last_seen_at',
        'duration_seconds',
        'page_views_count',
    ];

    protected $casts = [
        'first_seen_at' => 'datetime',
        'last_seen_at' => 'datetime',
    ];

    public function actions(): HasMany
    {
        return $this->hasMany(SiteVisitAction::class, 'site_visit_id');
    }

    /**
     * Durée formatée (ex: "5 min 30 s").
     */
    public function getFormattedDurationAttribute(): string
    {
        $s = (int) $this->duration_seconds;
        if ($s < 60) {
            return $s . ' s';
        }
        $min = (int) floor($s / 60);
        $sec = $s % 60;
        if ($min < 60) {
            return $min . ' min ' . ($sec ? $sec . ' s' : '');
        }
        $h = (int) floor($min / 60);
        $min = $min % 60;
        return $h . ' h ' . ($min ? $min . ' min' : '');
    }
}
