<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_CritereEvaluationPersonnel extends Model
{
    use HasFactory;

    protected $table="airid_criteres_evaluations_personnels";

    protected $guarded=["created_at","updated_at"];
}
