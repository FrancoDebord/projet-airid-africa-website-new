<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIRID_ProjectTeam extends Model
{
    use HasFactory;

    protected $table="airid_projects_teams";

    protected $guarded=["created_at","updated_at"];
}
