<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AIRID_Departement extends Model
{
    use HasFactory;

    protected $table="airid_departements";

    protected $guarded=["created_at","updated_at"];

    /**
     * Get all of the sub_departements for the AIRID_Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_departements(): HasMany
    {
        return $this->hasMany(AIRID_Sub_Departement::class, 'departement_id', 'id');
    }

    /**
     * Get all of the personnels for the AIRID_Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personnels(): HasMany
    {
        return $this->hasMany(AIRID_Personnel::class, 'departement_id', 'id');
    }
    /**
     * Get the chefDepartement that owns the AIRID_Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chefDepartement(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'chef_departement', 'id');
    }
}
