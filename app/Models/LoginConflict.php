<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginConflict extends Model
{
    protected $fillable = [
        'access_code',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
