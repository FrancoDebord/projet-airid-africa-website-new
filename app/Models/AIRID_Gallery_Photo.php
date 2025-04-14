<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_Gallery_Photo extends Model
{
    use HasFactory;

    protected $table="airid_galleries_photos";

    protected $guarded=["created_at","updated_at"];
}
