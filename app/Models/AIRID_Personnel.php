<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class AIRID_Personnel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table="airid_personnels";

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Générer automatiquement le mot de passe lors de la création
        static::creating(function ($personnel) {
            if (empty($personnel->password) && !empty($personnel->prenom_personnel)) {
                $annee = now()->format('Y');
                $password = 'Airid' . $personnel->prenom_personnel . $annee;
                // Le cast 'hashed' va automatiquement hasher le mot de passe
                $personnel->password = $password;
                // Stocker aussi le mot de passe en clair pour l'affichage
                $personnel->password_plain = $password;
            }
        });
    }

    /**
     * Génère un mot de passe selon le format: Airid{prenom_personnel}{année}
     *
     * @param string|null $prenom Le prénom du personnel
     * @param string|null $annee L'année (optionnel, utilise l'année actuelle par défaut)
     * @return string Le mot de passe en clair
     */
    public static function generatePassword($prenom = null, $annee = null)
    {
        $prenom = $prenom ?? '';
        $annee = $annee ?? now()->format('Y');
        return 'Airid' . $prenom . $annee;
    }

    protected $fillable = [
        'titre',
        'prenom_personnel',
        'nom_personnel',
        'email_personnel',
        'link_facebook',
        'link_twitter',
        'link_linkedin',
        'photo_personnel',
        'departement_id',
        'poste_id',
        'description_poste',
        'niveau_poste',
        'poids_personnel',
        'staff_category',
        'email_verified_at',
        'remember_token',
        'password',
        'password_plain',
    ];

    /** Staff category slugs for Our Team filter */
    public const CATEGORY_MANAGEMENT = 'management_operations';
    public const CATEGORY_FACILITY = 'facility_platform_supervisors';
    public const CATEGORY_RESEARCH = 'research_team';

    public static function categorySlugs(): array
    {
        return [
            self::CATEGORY_MANAGEMENT => 'Management & Operations',
            self::CATEGORY_FACILITY   => 'Facility & Platform Supervisors',
            self::CATEGORY_RESEARCH   => 'Research Team',
        ];
    }

    /**
     * Get staff_category as array (one or multiple values).
     * Stored as comma-separated string; empty/null returns [].
     */
    public function getStaffCategoriesListAttribute(): array
    {
        if (empty($this->staff_category)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode(',', $this->staff_category))));
    }

    /**
     * Check if this personnel belongs to a given category slug.
     */
    public function hasStaffCategory(string $slug): bool
    {
        return in_array($slug, $this->staff_categories_list, true);
    }

    /**
     * Scope: filter personnel that have the given category in their list.
     * staff_category is stored as comma-separated (e.g. "management_operations,research_team").
     */
    public function scopeInStaffCategory($query, string $slug)
    {
        return $query->where(function ($q) use ($slug) {
            $q->where('staff_category', $slug)
                ->orWhere('staff_category', 'LIKE', $slug . ',%')
                ->orWhere('staff_category', 'LIKE', '%,' . $slug)
                ->orWhere('staff_category', 'LIKE', '%,' . $slug . ',%');
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed', // Désactivé car on utilise setPasswordAttribute mutator
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email_personnel;
    }

    /**
     * Get the email attribute (maps to email_personnel for authentication).
     *
     * @return string|null
     */
    public function getEmailAttribute()
    {
        return $this->email_personnel;
    }

    /**
     * Set the email attribute (maps to email_personnel).
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email_personnel'] = $value;
    }

    /**
     * Set the password attribute (hash it if it's not already hashed).
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        // Si la valeur est vide, ne rien faire
        if (empty($value)) {
            return;
        }
        
        // Si la valeur n'est pas déjà hashée (ne commence pas par $2y$), la hasher
        if (!str_starts_with($value, '$2y$') && !str_starts_with($value, '$2a$') && !str_starts_with($value, '$2b$')) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            // Si c'est déjà hashé, le garder tel quel
            $this->attributes['password'] = $value;
        }
    }

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
     * URL publique de la photo (URL absolue via asset() pour affichage correct sur toutes les pages).
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo_personnel) {
            return null;
        }
        $photoName = basename($this->photo_personnel);
        if (file_exists(public_path('assets/staff/' . $photoName))) {
            return asset('assets/staff/' . $photoName);
        }
        if (file_exists(public_path('storage/assets/staff/' . $photoName))) {
            return asset('storage/assets/staff/' . $photoName);
        }
        return asset('storage/assets/staff/' . $photoName);
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
