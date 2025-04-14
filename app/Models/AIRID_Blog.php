<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AIRID_Blog extends Model
{
    use HasFactory;

    protected $table="airid_blogs";

    protected $guarded=["created_at","updated_at"];

    /**
     * Get the creatorBlog that owns the AIRID_Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorBlog(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'creator_id', 'id');
    }
}
