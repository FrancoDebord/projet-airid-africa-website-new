<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AIRID_Sub_Departement extends Model
{
    use HasFactory;
    protected $table="airid_sub_departements";

    protected $guarded=["created_at","updated_at"];

    /**
     * Get the departement that owns the AIRID_Sub_Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement(): BelongsTo
    {
        return $this->belongsTo(AIRID_Departement::class, 'departement_id', 'id');
    }


    /**
     * Get the chef_sous_departement that owns the AIRID_Sub_Departement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chefSousDepartement(): BelongsTo
    {
        return $this->belongsTo(AIRID_Personnel::class, 'chef_sous_departement', 'id');
    }
   

}
