<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    protected $fillable = [
        'application_name',
        'name',
        'currency',
        'email',
        'phone',
        'address',
        'contacting_hours',
    ];
}
