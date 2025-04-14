<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Gallery extends Model
{
    use HasFactory;

    protected $table="airid_galleries";

    protected $guarded=["created_at","updated_at"];
}
