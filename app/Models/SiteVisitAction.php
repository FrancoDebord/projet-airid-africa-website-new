<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteVisitAction extends Model
{
    public $timestamps = false;

    protected $table = 'site_visit_actions';

    protected $fillable = [
        'site_visit_id',
        'url',
        'page_title',
        'action_type',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function siteVisit(): BelongsTo
    {
        return $this->belongsTo(SiteVisit::class, 'site_visit_id');
    }
}
