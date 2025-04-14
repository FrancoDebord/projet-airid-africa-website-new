<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AIRID_Project extends Model
{
    use HasFactory;

    protected $table="airid_projects";

    protected $guarded=["created_at","updated_at"];


    /**
     * The personnelsTeam that belong to the AIRID_Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personnelsTeam(): BelongsToMany
    {
        return $this->belongsToMany(AIRID_Personnel::class, 'airid_projects_teams', 'project_id', 'personnel_id');
    }

    /**
     * Get the studyDirector that owns the AIRID_Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyDirector(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'study_director', 'id');
    }

    /**
     * Get the projectManager that owns the AIRID_Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectManager(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'project_manager', 'id');
    }

    /**
     * Get the sponsor that owns the AIRID_Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(AIRID_Partenaire::class, 'sponsor_id', 'id');
    }

    /**
     * Get the category that owns the AIRID_Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(AIRID_ProjetCategory::class, 'category_id', 'id');
    }
}
