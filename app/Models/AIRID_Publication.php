<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Publication extends Model
{
    use HasFactory;

    protected $table="airid_publications";

    protected $guarded=["created_at","updated_at"];
}
