<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Testimony extends Model
{
    use HasFactory;

    protected $table="airid_testimonies";

    protected $guarded=["created_at","updated_at"];
}
