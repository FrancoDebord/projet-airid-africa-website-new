<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Poste extends Model
{
    use HasFactory;

    protected $table="airid_postes";

    protected $guarded=["created_at","updated_at"];
}
