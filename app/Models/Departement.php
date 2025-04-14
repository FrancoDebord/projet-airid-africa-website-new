<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    //
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

}
