<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class StaffPlatformsAccess extends Model
{
    protected $table = 'staff_platforms_access';

    protected $fillable = ['prenom', 'nom', 'email'];

    protected function nom(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtoupper($value),
            set: fn (string $value) => strtoupper($value),
        );
    }
}
