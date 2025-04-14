<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AIRID_ProjetCategory extends Model
{
    use HasFactory;

    protected $table="airid_projects_categories";

    protected $guarded=["created_at","updated_at"];

    /**
     * Get all of the projects for the AIRID_ProjetCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(AIRID_Project::class, 'category_id', 'id');
    }
}
