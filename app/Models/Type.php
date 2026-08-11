<?php

namespace App\Models;

use App\Enum\TypeActiveStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => TypeActiveStatus::class,
        ];
    }
}
