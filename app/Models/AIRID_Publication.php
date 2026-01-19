<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Publication extends Model
{
    use HasFactory;

    protected $table="airid_publications";

    protected $fillable = [
        'titre_publication',
        'auteurs',
        'annee_publication',
        'url_publication',
        'resume_publication',
        'photo_couverture',
        'fichier_publication',
    ];
}
