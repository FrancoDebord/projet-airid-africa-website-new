<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AIRID_Personnel extends Model
{
    use HasFactory;

    protected $table="airid_personnels";

    protected $guarded=["created_at","updated_at"];

    /**
     * Get the departement that owns the AIRID_Personnel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement(): BelongsTo
    {
        return $this->belongsTo(AIRID_Departement::class, 'departement_id', 'id');
    }
    /**
     * Get the posteOccupe that owns the AIRID_Personnel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posteOccupe(): BelongsTo
    {
        return $this->belongsTo(AIRID_Poste::class, 'poste_id', 'id');
    }

    /**
     * The criteresEvaluationPersonnels that belong to the AIRID_Personnel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function criteresEvaluationPersonnels(): BelongsToMany
    {
        return $this->belongsToMany(AIRID_CritereEvaluation::class, 'airid_criteres_evaluations_personnels', 'personnel_id', 'critere_id')->withPivot('pourcentage_valeur');
    }
}
