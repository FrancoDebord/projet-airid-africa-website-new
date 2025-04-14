<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AIRID_News extends Model
{
    use HasFactory;

    protected $table="airid_news";

    protected $guarded=["created_at","updated_at"];

     /**
     * Get the creatorNews that owns the AIRID_Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorNews(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'creator_id', 'id');
    }

    /**
     * Get all of the photosGallery for the AIRID_News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photosGallery(): HasMany
    {
        return $this->hasMany(AIRID_Gallery_Photo::class, 'event_id', 'id')->where("type_vent","airid_news");
    }
}
