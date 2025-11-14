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

    protected $fillable = [
        'titre',
        'prenom_personnel',
        'nom_personnel',
        'photo_personnel',
        'departement_id',
        'poste_id',
        'niveau_poste',
        'poids_personnel',
    ];

    /**
     * Get the photo path attribute - normalise le chemin de la photo
     * Gère les anciennes données avec chemin complet et les nouvelles avec juste le nom
     */
    public function getPhotoPathAttribute()
    {
        if (!$this->photo_personnel) {
            return null;
        }

        // Si c'est déjà un chemin complet, extraire juste le nom du fichier
        $fileName = basename($this->photo_personnel);
        
        // Vérifier si le fichier existe dans public/assets/staff/
        $publicPath = public_path('assets/staff/' . $fileName);
        if (file_exists($publicPath)) {
            return $fileName;
        }

        // Si le fichier n'existe pas, retourner le nom tel quel
        return $fileName;
    }

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
